# cPanel-এ Deploy (ACI Marine)

প্রজেক্ট standard Laravel-এর মতোই চলে: **server-এ একটা সাধারণ `.env` ফাইল থাকলেই হবে।** আলাদা কোনো `.env.production` লাগে না — আপনার PC-তে আর server-এ দুই জায়গাতেই নিজেদের `.env` চলে।

---

## প্রথমবারের setup (শুধু একবার করতে হবে)

### ১. cPanel-এ database বানান

1. cPanel → **MySQL Databases**:
   - নতুন database বানান (যেমন: `cpaneluser_acimarine`)
   - নতুন database user বানান, password দিন
   - User-কে database-এ **Add** করে **ALL PRIVILEGES** দিন
2. Local phpMyAdmin থেকে `aci_marine_laravel` database **Export** করুন (SQL format)।
3. cPanel → **phpMyAdmin** → নতুন database select করে SQL ফাইলটা **Import** করুন।

### ২. Server-এ `.env` বানান

1. cPanel → **File Manager** → site-এর root (যেখানে `index.php`, `artisan`, `.env.example` আছে)।
2. `.env.example` ফাইলটা select করে **Copy** করুন (একই জায়গায়), কপিটার নাম দিন **`.env`**।
3. `.env`-এ right-click → **Edit** করে এই মানগুলো বসান:
   - `APP_NAME` → সাইটের নাম
   - `APP_ENV=production`, `APP_DEBUG=false`
   - `APP_URL` → আপনার আসল domain (যেমন `https://acimarine.com`)
   - `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` → ধাপ ১-এ বানানো database-এর তথ্য
4. **APP_KEY** সেট করুন — cPanel → **Terminal** খুলে প্রজেক্ট root থেকে:
   ```
   php artisan key:generate
   ```
   (Terminal না থাকলে আপনার PC-র `.env`-এর `APP_KEY`-এর মানটা কপি করে বসাতে পারেন।)

> **খেয়াল:** পুরনো deploy থেকে server-এ `.env.production` নামের ফাইল পড়ে থাকলে সেটা **delete করে দিন** — নাহলে Laravel সেটাকেই নিয়ে নেবে আর `.env`-এর মান ignore হয়ে যাবে।

### ৩. PHP version

cPanel → **MultiPHP Manager** → domain select করে PHP **8.2** বা **8.3** দিন (৮.২-এর নিচে সাইট চলবে না)।

---

## প্রতিবার deploy করার নিয়ম (৩ ক্লিক)

1. **`deploy-zip.bat` double-click করুন** — প্রজেক্ট ফোল্ডারের পাশে `aci_marine_deploy.zip` তৈরি হবে (node_modules, .git, `.env` এসব বাদ দিয়ে)।
2. cPanel → **File Manager** → `public_html` → zip-টা **Upload** করুন।
3. Zip-এ right-click → **Extract** → zip ফাইলটা delete করে দিন। **ব্যস, সাইট live!**

> Zip-এ কোনো `.env` ফাইল থাকে না, তাই extract করলেও server-এ আপনার configured `.env` **overwrite হয় না**।

> CSS/JS-এ পরিবর্তন করে থাকলে zip বানানোর আগে একবার `npm run build` চালিয়ে নেবেন।

**খেয়াল রাখবেন:** Extract-এর পর `index.php`, `.htaccess`, `public/`, `vendor/` যেন সরাসরি `public_html`-এর ভিতরে থাকে (extra কোনো ফোল্ডারের ভিতরে নয়)। Subdomain/subfolder-এ দিলেও একই নিয়ম।

### Git দিয়ে deploy করলে

`.env` git-এ যায় না (gitignored) — তাই server-এ আলাদা করে একবার `.env` বানাতে হবে (উপরের ধাপ ২), আর dependency-র জন্য server-এ `composer install --no-dev` চালাতে হবে (বা `vendor/` ফোল্ডারটা আলাদা কপি করে দিতে হবে)।

---

## কীভাবে কাজ করে (জানার জন্য)

- Root-এর [.htaccess](.htaccess) সব request automatic `public/` ফোল্ডারে পাঠায় — তাই project structure বদলাতে হয় না। এটা কোনো absolute path বা ফাইল-চেকের উপর নির্ভর করে না, তাই cPanel-এর যেকোনো জায়গায় (public_html, addon domain, subfolder) upload করলেই কাজ করে।
- [bootstrap/app.php](bootstrap/app.php) এখন কোনো special কিছু করে না — standard Laravel-এর মতো project root-এর `.env` লোড হয়, Windows আর Linux দুই জায়গাতেই একই নিয়ম।
- Extract করলে server-এর পুরনো ফাইল overwrite হয়, কিন্তু server-এ নতুন upload হওয়া ছবি (`public/uploads/`) **মুছে যায় না** — শুধু একই নামের ফাইল থাকলে replace হয়।
- `deploy-zip.bat` compiled cache/session/log ফাইলগুলোও বাদ দেয় — server-এ ওগুলো নিজে থেকেই আবার তৈরি হয়।

---

## সমস্যা হলে

| সমস্যা | সমাধান |
|---|---|
| **"Base table or view not found"** (যেমন `sessions`) | Server database-এ Laravel-এর framework table নেই। [docs/fix_missing_tables.sql](docs/fix_missing_tables.sql) ফাইলটা cPanel → phpMyAdmin → database select করে **Import** করুন। |
| **500 Error** | `.env`-এর DB তথ্য আর `APP_KEY` ঠিক আছে কিনা দেখুন। PHP version 8.2+ কিনা দেখুন। |
| **Permission error** | File Manager-এ `storage` আর `bootstrap/cache` ফোল্ডারের permission **755** করুন (recursive)। |
| **আসল error দেখতে চাইলে** | `.env`-এ সাময়িকভাবে `APP_DEBUG=true` করুন, **কাজ শেষে আবার `false`**। Error log: `storage/logs/laravel.log` |
| **পুরনো design/data দেখালে** | cPanel-এ **Terminal** থাকলে: `php artisan config:clear && php artisan view:clear && php artisan cache:clear`। Terminal না থাকলে `storage/framework/views/`-এর ভিতরের `.php` ফাইলগুলো delete করুন। |
| **CSS/ছবি লোড হচ্ছে না** | `.env`-এ `APP_URL` ঠিক আছে কিনা দেখুন। |
| **`.env` ঠিক করার পরও পুরনো value দেখাচ্ছে** | Server-এ পুরনো `.env.production` ফাইল পড়ে আছে কিনা দেখুন — থাকলে delete করুন, তারপর config:clear। |

## Security নোট

- Root `.htaccess` sensitive ফাইল (`.env`, `.env.production`, `composer.json` ইত্যাদি) আর পুরনো dev script গুলো (fix.php, cleanup.php ইত্যাদি) web থেকে block করে দেয়।
- Deploy zip-এ `.env` যায় না, তাই credential কোথাও leak হয় না।
- প্রজেক্ট root-এর পুরনো one-off dev script গুলো (`fix.php`, `cleanup.php`, `extract.php` ইত্যাদি) local থেকেই delete করা হয়েছে — নতুন zip-এ আর আসবে না। Server-এ আগের কোনো deploy থেকে পড়ে থাকলে মুছে দিতে পারেন — সাইট চলার জন্য এগুলো লাগে না।
