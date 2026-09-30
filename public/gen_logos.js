const fs = require('fs');
const path = require('path');

const logosDir = path.join(__dirname, 'image', 'logos');
if (!fs.existsSync(logosDir)) {
    fs.mkdirSync(logosDir, { recursive: true });
}

const logos = {
    cpa: {
        name: 'Chittagong Port',
        subText: 'Authority',
        color: '#0f2942',
        accent: '#d4af37',
        icon: `<circle cx="25" cy="30" r="16" fill="none" stroke="#0f2942" stroke-width="2.5"/>
               <circle cx="25" cy="30" r="12" fill="none" stroke="#d4af37" stroke-width="1.5" stroke-dasharray="2 2"/>
               <path d="M25 18 v18 M20 25 h10 M17 33 Q25 38 33 33" stroke="#0f2942" stroke-width="2.5" fill="none" stroke-linecap="round"/>
               <path d="M25 36 A2 2 0 1 0 25.001 36" stroke="#d4af37" stroke-width="3" stroke-linecap="round"/>`
    },
    mongla: {
        name: 'Mongla Port',
        subText: 'Authority',
        color: '#006d77',
        accent: '#d4af37',
        icon: `<circle cx="25" cy="30" r="16" fill="none" stroke="#006d77" stroke-width="2.5"/>
               <path d="M21 24 l4 -5 l4 5 M25 19 v13 M20 28 h10" stroke="#d4af37" stroke-width="2" fill="none" stroke-linecap="round"/>
               <path d="M15 32 Q25 37 35 32" stroke="#006d77" stroke-width="2.5" fill="none"/>`
    },
    payra: {
        name: 'Payra Port',
        subText: 'Authority',
        color: '#0056b3',
        accent: '#d4af37',
        icon: `<circle cx="25" cy="30" r="16" fill="none" stroke="#0056b3" stroke-width="2.5"/>
               <path d="M25 18 A5 5 0 0 1 25 28 A5 5 0 0 1 25 18 M25 28 v8 M17 31 h16" stroke="#0056b3" stroke-width="2" fill="none"/>
               <path d="M19 23 A3 3 0 0 1 31 23" fill="#d4af37"/>`
    },
    navy: {
        name: 'Bangladesh Navy',
        subText: 'Official Client',
        color: '#002060',
        accent: '#ffd700',
        icon: `<path d="M25 15 L37 22 V35 L25 43 L13 35 V22 Z" fill="#002060"/>
               <path d="M25 18 L34 23 V33 L25 40 L16 33 V23 Z" fill="none" stroke="#ffd700" stroke-width="1.5"/>
               <circle cx="25" cy="27" r="5" fill="none" stroke="#ffd700" stroke-width="1.5"/>
               <path d="M22 27 h6 M25 24 v6" stroke="#ffd700" stroke-width="1.5"/>`
    },
    coastguard: {
        name: 'Bangladesh',
        subText: 'Coast Guard',
        color: '#0B132B',
        accent: '#FFC300',
        icon: `<path d="M25 15 Q35 15 37 25 Q37 35 25 43 Q13 35 13 25 Q15 15 25 15" fill="#0B132B"/>
               <circle cx="25" cy="27" r="7" fill="none" stroke="#FFC300" stroke-width="2"/>
               <path d="M19 27 h12 M25 21 v12" stroke="#FFC300" stroke-width="1.5"/>`
    },
    khulna: {
        name: 'Khulna Shipyard',
        subText: 'KSY Limited',
        color: '#0033aa',
        accent: '#ff5500',
        icon: `<circle cx="25" cy="30" r="14" fill="none" stroke="#0033aa" stroke-width="3"/>
               <path d="M25 18 v24 M18 25 h14 M20 20 l10 10 M20 30 l10 -10" stroke="#ff5500" stroke-width="2" stroke-linecap="round"/>
               <circle cx="25" cy="30" r="6" fill="#0033aa"/>`
    },
    dockyard: {
        name: 'Dockyard & Eng.',
        subText: 'Works Limited',
        color: '#1e40af',
        accent: '#64748b',
        icon: `<rect x="13" y="18" width="24" height="24" rx="4" fill="none" stroke="#1e40af" stroke-width="2.5"/>
               <path d="M18 26 l4 8 l10 -10" stroke="#64748b" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>`
    },
    cddl: {
        name: 'Chittagong Dry Dock',
        subText: 'CDDL Limited',
        color: '#dc2626',
        accent: '#1e3a8a',
        icon: `<path d="M12 20 h26 v20 h-26 z" fill="none" stroke="#1e3a8a" stroke-width="2.5"/>
               <path d="M12 25 h26 M12 35 h26" stroke="#dc2626" stroke-width="1.5"/>
               <path d="M20 20 v20 M30 20 v20" stroke="#1e3a8a" stroke-width="1.5"/>`
    },
    biwta: {
        name: 'BIWTA',
        subText: 'Water Transport Auth.',
        color: '#15803d',
        accent: '#b91c1c',
        icon: `<circle cx="25" cy="30" r="15" fill="none" stroke="#15803d" stroke-width="3"/>
               <circle cx="25" cy="30" r="10" fill="none" stroke="#b91c1c" stroke-width="1.5" stroke-dasharray="3 2"/>
               <path d="M25 22 v16 M21 26 h8" stroke="#15803d" stroke-width="2" stroke-linecap="round"/>`
    },
    biwtc: {
        name: 'BIWTC',
        subText: 'Water Transport Corp.',
        color: '#0f172a',
        accent: '#38bdf8',
        icon: `<circle cx="25" cy="30" r="15" fill="none" stroke="#0f172a" stroke-width="3"/>
               <path d="M15 32 Q25 22 35 32" stroke="#38bdf8" stroke-width="2.5" fill="none" stroke-linecap="round"/>
               <circle cx="25" cy="24" r="3" fill="#0f172a"/>`
    },
    bwdb: {
        name: 'BWDB',
        subText: 'Water Dev. Board',
        color: '#0284c7',
        accent: '#22c55e',
        icon: `<path d="M25 15 Q33 22 33 30 A8 8 0 0 1 17 30 Q17 22 25 15" fill="#0284c7"/>
               <path d="M25 22 Q29 26 29 30 A4 4 0 0 1 21 30 Q21 26 25 22" fill="#22c55e"/>`
    },
    bsc: {
        name: 'BSC',
        subText: 'Shipping Corporation',
        color: '#172554',
        accent: '#eab308',
        icon: `<circle cx="25" cy="30" r="15" fill="#172554"/>
               <path d="M18 30 h14 L25 20 Z" fill="#eab308"/>
               <path d="M18 32 h14 L25 37 Z" fill="#ffffff"/>`
    },
    dbl: {
        name: 'dbl',
        subText: 'GROUP',
        color: '#2e7d32',
        accent: '#1565c0',
        icon: `<path d="M20 32 A8 8 0 0 1 28 20 A8 8 0 0 1 36 32 Z" fill="#2e7d32" opacity="0.8"/>
               <circle cx="22" cy="30" r="7" fill="#1565c0" opacity="0.8"/>
               <circle cx="28" cy="34" r="6" fill="#eab308" opacity="0.8"/>`
    },
    ssr: {
        name: 'SSR GROUP',
        subText: 'TOGETHER WE CARE',
        color: '#991b1b',
        accent: '#1e293b',
        icon: `<path d="M15 20 L22 15 L35 25 L35 35 L28 40 L15 30 Z" fill="#991b1b"/>
               <path d="M20 22 l10 8 M18 27 l10 8" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>`
    },
    quest: {
        name: 'QUEST',
        subText: 'LOGISTICS',
        color: '#e11d48',
        accent: '#000000',
        icon: `<circle cx="25" cy="27" r="10" fill="#e11d48"/>
               <path d="M13 35 Q25 43 37 35 Q25 38 13 35" fill="#000000"/>
               <path d="M15 32 Q25 39 35 32 Q25 35 15 32" fill="#000000" opacity="0.6"/>`
    },
    greenline: {
        name: 'GREEN LINE',
        subText: 'PARIBAHAN',
        color: '#16a34a',
        accent: '#dc2626',
        icon: `<path d="M14 22 h12 L20 38 Z" fill="#16a34a"/>
               <path d="M22 22 h12 L28 38 Z" fill="#dc2626"/>`
    },
    petromax: {
        name: 'PETROMAX',
        subText: 'LPG',
        color: '#ea580c',
        accent: '#1f2937',
        icon: `<path d="M25 15 Q30 23 27 28 Q33 24 33 32 A8 8 0 0 1 17 32 Q17 24 25 15" fill="#ea580c"/>
               <path d="M25 24 Q28 28 26 31 A2.5 2.5 0 0 1 21 31" fill="#1f2937"/>`
    },
    bmlpgas: {
        name: 'BM LP GAS',
        subText: 'BM ENERGY',
        color: '#2563eb',
        accent: '#0d9488',
        icon: `<path d="M25 15 Q32 25 32 32 A7 7 0 0 1 18 32 A7 7 0 0 1 25 15" fill="#2563eb"/>
               <path d="M25 22 Q29 28 29 32 A4 4 0 0 1 21 32" fill="#0d9488"/>`
    },
    brac: {
        name: 'brac',
        subText: 'DEVELOPMENT',
        color: '#d946ef',
        accent: '#701a75',
        icon: `<rect x="15" y="20" width="20" height="20" rx="4" fill="#d946ef"/>
               <circle cx="25" cy="30" r="5" fill="#ffffff"/>`
    },
    seapearl: {
        name: 'SEA PEARL',
        subText: 'Resort & Spa',
        color: '#ca8a04',
        accent: '#111827',
        icon: `<path d="M25 15 Q30 25 35 25 Q25 28 15 25 Q20 25 25 15" fill="#ca8a04"/>
               <circle cx="25" cy="25" r="3" fill="#111827"/>
               <path d="M15 32 Q25 37 35 32" stroke="#ca8a04" stroke-width="2" fill="none"/>`
    },
    citygroup: {
        name: 'citygroup',
        subText: 'Quality Products',
        color: '#e11d48',
        accent: '#475569',
        icon: `<path d="M25 18 C15 10 10 25 25 38 C40 25 35 10 25 18" fill="#e11d48"/>
               <circle cx="25" cy="25" r="4" fill="#ffffff"/>`
    },
    bashundhara: {
        name: 'BASHUNDHARA',
        subText: 'For the People',
        color: '#e11d48',
        accent: '#1e293b',
        icon: `<circle cx="25" cy="30" r="14" fill="none" stroke="#e11d48" stroke-width="3"/>
               <path d="M15 30 Q25 18 35 30" stroke="#e11d48" stroke-width="2" fill="none"/>
               <circle cx="25" cy="30" r="4" fill="#e11d48"/>`
    },
    karnafully: {
        name: 'Karnafully',
        subText: 'Shipbuilders Ltd',
        color: '#1e3a8a',
        accent: '#0ea5e9',
        icon: `<circle cx="25" cy="30" r="15" fill="none" stroke="#1e3a8a" stroke-width="2.5"/>
               <path d="M15 30 h20 L30 35 h-10 Z" fill="#0ea5e9"/>
               <path d="M18 28 Q25 20 32 28" stroke="#1e3a8a" stroke-width="2" fill="none"/>`
    },
    marinehouse: {
        name: 'Marine House',
        subText: 'Consultancy',
        color: '#0f172a',
        accent: '#b45309',
        icon: `<path d="M15 25 L25 15 L35 25 M18 25 v12 h14 v-12" fill="none" stroke="#0f172a" stroke-width="2"/>
               <path d="M25 23 v10 M21 28 h8" stroke="#b45309" stroke-width="1.5" stroke-linecap="round"/>`
    },
    radiant: {
        name: 'RADIANT',
        subText: 'Shipyard Limited',
        color: '#1e293b',
        accent: '#eab308',
        icon: `<path d="M15 35 L25 17 L35 35 Z" fill="#1e293b"/>
               <path d="M25 17 v18 M20 28 l10 0" stroke="#eab308" stroke-width="1.5"/>`
    },
    omel: {
        name: 'OMEL',
        subText: 'Official Client',
        color: '#06b6d4',
        accent: '#0891b2',
        icon: `<path d="M15 35 Q25 20 35 35 Z" fill="#06b6d4"/>
               <circle cx="25" cy="24" r="4" fill="#0891b2"/>`
    },
    toggi: {
        name: 'toggi',
        subText: 'SHIPPING & LOGISTICS',
        color: '#22c55e',
        accent: '#475569',
        icon: `<path d="M15 20 Q25 15 35 25 Q25 35 15 20" fill="#22c55e"/>
               <path d="M20 28 Q28 28 32 34" stroke="#475569" stroke-width="2" fill="none" stroke-linecap="round"/>`
    }
};

Object.entries(logos).forEach(([key, value]) => {
    // Generate SVG content
    const nameSize = value.name.length > 12 ? '13px' : '15px';
    const subSize = '8px';
    const nameY = value.subText ? '28' : '35';
    
    let textElements = '';
    if (key === 'brac' || key === 'dbl' || key === 'citygroup' || key === 'toggi') {
        // Lowercase branded look
        textElements = `
            <text x="50" y="${nameY}" font-family="system-ui, -apple-system, sans-serif" font-size="${nameSize}" font-weight="800" fill="${value.color}" letter-spacing="-0.02em">${value.name}</text>
            ${value.subText ? `<text x="50" y="40" font-family="system-ui, -apple-system, sans-serif" font-size="${subSize}" font-weight="700" fill="${value.accent}" letter-spacing="0.12em">${value.subText.toUpperCase()}</text>` : ''}
        `;
    } else {
        // Standard uppercase/mixed branded look
        textElements = `
            <text x="50" y="${nameY}" font-family="system-ui, -apple-system, sans-serif" font-size="${nameSize}" font-weight="800" fill="${value.color}" letter-spacing="0.02em">${value.name.toUpperCase()}</text>
            ${value.subText ? `<text x="50" y="40" font-family="system-ui, -apple-system, sans-serif" font-size="${subSize}" font-weight="700" fill="${value.accent}" letter-spacing="0.12em">${value.subText.toUpperCase()}</text>` : ''}
        `;
    }

    const svgContent = `<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<svg width="180" height="60" viewBox="0 0 180 60" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <g id="logo-content">
        <!-- Icon -->
        <g id="icon-group">
            ${value.icon}
        </g>
        <!-- Text -->
        ${textElements}
    </g>
</svg>
`;

    const filePath = path.join(logosDir, `${key}.svg`);
    fs.writeFileSync(filePath, svgContent, 'utf8');
    console.log(`Generated logo: ${key}.svg`);
});

console.log('All logos generated successfully!');
