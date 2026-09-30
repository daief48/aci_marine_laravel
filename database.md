# ACI Marine Database Schema Documentation

This document describes the structure of the database tables, Eloquent models, cast types, and relationships in the **ACI Marine** Laravel application.

---

## 1. Entity-Relationship Diagram (ERD)

```mermaid
erDiagram
    users {
        bigint id PK
        string name
        string email UK
        timestamp email_verified_at
        string password
        string remember_token
        timestamps timestamps
    }

    gallery_categories {
        bigint id PK
        string name
        integer order
        boolean is_active
        timestamps timestamps
    }

    gallery_items {
        bigint id PK
        bigint gallery_category_id FK
        string image_url
        string badge
        string title
        string description
        boolean is_featured
        integer order
        boolean is_active
        timestamps timestamps
    }

    product_thumbles {
        bigint id PK
        string title
        string tag
        string subtitle
        string image_url
        string image
        integer order
        boolean is_active
        timestamps timestamps
    }

    products {
        bigint id PK
        bigint product_thumble_id FK
        string name
        string link_url
        string image
        integer order
        boolean is_active
        text general_info
        text applications
        text ratings
        text docs
        json benefits
        json features
        json specs
        timestamps timestamps
    }

    project_references {
        bigint id PK
        string slug UK
        string title
        string project_category
        string client
        string end_owner
        string classification
        string hero_bg
        string vessel_type
        string overview_heading
        text overview_text
        string engine_model
        text engine_desc
        string gearbox_model
        text gearbox_desc
        string class_society
        text class_desc
        text class_specs
        string vessel_details
        text vessel_desc
        string diagram_engine
        string diagram_engine_model
        string diagram_gearbox
        string diagram_gearbox_model
        string gallery_title
        text gallery_desc
        json phases
        json gallery_items
        json simulation_data
        timestamps timestamps
    }

    hero_slides {
        bigint id PK
        string title
        string subtitle
        string image_url
        string button_text
        string button_link
        integer order
        boolean is_active
        timestamps timestamps
    }

    clients {
        bigint id PK
        string name
        string logo_url
        integer order
        boolean is_active
        timestamps timestamps
    }

    news_events {
        bigint id PK
        string title
        string category
        string image_url
        text description
        string link_url
        integer order
        boolean is_active
        timestamps timestamps
    }

    company_stats {
        bigint id PK
        string number
        string label
        integer order
        boolean is_active
        timestamps timestamps
    }

    about_highlights {
        bigint id PK
        string icon
        string title
        string text
        integer order
        boolean is_active
        timestamps timestamps
    }

    settings {
        bigint id PK
        string key UK
        text value
        timestamps timestamps
    }

    gallery_categories ||--o{ gallery_items : "has many"
    product_thumbles ||--o{ products : "has many"
```

---

## 2. Table Schemas & Eloquent Models

### 2.1 Gallery Category Layer

#### `gallery_categories`
Stores custom categories managed by the administrator for grouping images in the website gallery.
* **Eloquent Model**: `App\Models\GalleryCategory`
* **Schema Fields**:
  * `id` (`BIGINT`, PK, Auto-increment)
  * `name` (`VARCHAR(255)`, Category Label)
  * `order` (`INT`, Sorting sequence order)
  * `is_active` (`TINYINT(1)`, Default `1`)
  * `created_at` / `updated_at` (`TIMESTAMP`)
* **Relationships**:
  * `galleryItems()` -> `HasMany` (`App\Models\GalleryItem`)

#### `gallery_items`
Holds the individual photos, titles, and descriptions that belong inside the Gallery grid.
* **Eloquent Model**: `App\Models\GalleryItem`
* **Schema Fields**:
  * `id` (`BIGINT`, PK, Auto-increment)
  * `gallery_category_id` (`BIGINT`, FK pointing to `gallery_categories.id`, nullable, on delete cascade)
  * `image_url` (`VARCHAR(255)`, URL or path to media asset)
  * `badge` (`VARCHAR(255)`, Optional small overlay badge)
  * `title` (`VARCHAR(255)`)
  * `description` (`TEXT`)
  * `is_featured` (`TINYINT(1)`, Default `0`)
  * `order` (`INT`, Sorting sequence order)
  * `is_active` (`TINYINT(1)`, Default `1`)
  * `created_at` / `updated_at` (`TIMESTAMP`)
* **Relationships**:
  * `galleryCategory()` -> `BelongsTo` (`App\Models\GalleryCategory`)

---

### 2.2 Product Division Layer

#### `product_thumbles`
Defines the business areas or category divisions for machinery (e.g. propulsion engines, steering gears).
* **Eloquent Model**: `App\Models\ProductThumble`
* **Schema Fields**:
  * `id` (`BIGINT`, PK, Auto-increment)
  * `title` (`VARCHAR(255)`)
  * `tag` (`VARCHAR(255)`, Code tag)
  * `subtitle` (`VARCHAR(255)`)
  * `image_url` (`VARCHAR(255)`, Fallback image path)
  * `image` (`VARCHAR(255)`, Custom upload path, overrides `image_url`)
  * `order` (`INT`, Sort order)
  * `is_active` (`TINYINT(1)`, Default `1`)
  * `created_at` / `updated_at` (`TIMESTAMP`)
* **Relationships**:
  * `products()` -> `HasMany` (`App\Models\Product`)

#### `products`
The individual physical models/items sold or serviced under each division. Includes details for tabs on product sheets.
* **Eloquent Model**: `App\Models\Product`
* **Schema Fields**:
  * `id` (`BIGINT`, PK, Auto-increment)
  * `product_thumble_id` (`BIGINT`, FK pointing to `product_thumbles.id`, on delete cascade)
  * `name` (`VARCHAR(255)`)
  * `link_url` (`VARCHAR(255)`, Relative URL route)
  * `image` (`VARCHAR(255)`, Uploaded file path)
  * `order` (`INT`)
  * `is_active` (`TINYINT(1)`, Default `1`)
  * `general_info` (`TEXT`, HTML specifications layout)
  * `applications` (`TEXT`, HTML specifications layout)
  * `ratings` (`TEXT`, HTML specifications layout)
  * `docs` (`TEXT`, Links or references)
  * `benefits` (`JSON`, Casted to `array`)
  * `features` (`JSON`, Casted to `array`)
  * `specs` (`JSON`, Casted to `array`)
  * `created_at` / `updated_at` (`TIMESTAMP`)
* **Relationships**:
  * `productThumble()` -> `BelongsTo` (`App\Models\ProductThumble`)

---

### 2.3 Project Reference Layer

#### `project_references`
Complex project entries detailing the ship/vessel builds, machinery configured, custom timelines, and interactive HTML5 simulation metrics.
* **Eloquent Model**: `App\Models\ProjectReference`
* **Schema Fields**:
  * `id` (`BIGINT`, PK, Auto-increment)
  * `slug` (`VARCHAR(255)`, Unique slug for routes)
  * `title` (`VARCHAR(255)`)
  * `project_category` (`VARCHAR(255)`, Engine & Gearbox, Propulsion, etc.)
  * `client` (`VARCHAR(255)`)
  * `end_owner` (`VARCHAR(255)`)
  * `classification` (`VARCHAR(255)`)
  * `hero_bg` (`VARCHAR(255)`)
  * `vessel_type` (`VARCHAR(255)`)
  * `overview_heading` (`VARCHAR(255)`)
  * `overview_text` (`TEXT`)
  * `engine_model` (`VARCHAR(255)`)
  * `engine_desc` (`TEXT`)
  * `gearbox_model` (`VARCHAR(255)`)
  * `gearbox_desc` (`TEXT`)
  * `class_society` (`VARCHAR(255)`)
  * `class_desc` (`TEXT`)
  * `class_specs` (`TEXT`)
  * `vessel_details` (`VARCHAR(255)`)
  * `vessel_desc` (`TEXT`)
  * `diagram_engine` (`VARCHAR(255)`, e.g., Brand logo name)
  * `diagram_engine_model` (`VARCHAR(255)`)
  * `diagram_gearbox` (`VARCHAR(255)`)
  * `diagram_gearbox_model` (`VARCHAR(255)`)
  * `gallery_title` (`VARCHAR(255)`)
  * `gallery_desc` (`TEXT`)
  * `phases` (`JSON`, Timeline milestone logs. Casted to `array`)
  * `gallery_items` (`JSON`, Slider gallery image list. Casted to `array`)
  * `simulation_data` (`JSON`, Dynamic dashboard bounds. Casted to `array`)
  * `created_at` / `updated_at` (`TIMESTAMP`)

---

### 2.4 Website Components and Configurations

#### `hero_slides`
* **Eloquent Model**: `App\Models\HeroSlide`
* **Schema Fields**: `id`, `title`, `subtitle`, `image_url`, `button_text`, `button_link`, `order`, `is_active`, `timestamps`.

#### `clients`
* **Eloquent Model**: `App\Models\Client`
* **Schema Fields**: `id`, `name`, `logo_url`, `order`, `is_active`, `timestamps`.

#### `news_events`
* **Eloquent Model**: `App\Models\NewsEvent`
* **Schema Fields**: `id`, `title`, `category`, `image_url`, `description`, `link_url`, `order`, `is_active`, `timestamps`.

#### `company_stats`
* **Eloquent Model**: `App\Models\CompanyStat`
* **Schema Fields**: `id`, `number` (e.g. "200+"), `label` (e.g. "Vessels Completed"), `order`, `is_active`, `timestamps`.

#### `about_highlights`
* **Eloquent Model**: `App\Models\AboutHighlight`
* **Schema Fields**: `id`, `icon` (SVG markup or name), `title`, `text`, `order`, `is_active`, `timestamps`.

#### `settings`
* **Eloquent Model**: `App\Models\Setting`
* **Schema Fields**: `id`, `key` (Unique key index), `value` (`TEXT` or HTML content), `timestamps`.
