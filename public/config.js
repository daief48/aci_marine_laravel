// ACI Marine Global Configuration
// This file is dynamically parsed and modified by the backend or administrators.
window.aciMarineConfig = {
    // Start year of Marine Business. Year count is calculated as (Current Year - startYear).
    startYear: 2018,
    // Dynamic stats numbers
    projectsCount: 500,
    clientsCount: 50,
    shipyardsCount: 3
};

(function() {
    function updateDynamicContent() {
        const config = window.aciMarineConfig || {
            startYear: 2018,
            projectsCount: 500,
            clientsCount: 50,
            shipyardsCount: 3
        };
        
        const currentYear = new Date().getFullYear();
        const yearsCount = Math.max(0, currentYear - config.startYear);


        // 2. Update Slider / Title Text mentions of "5 Years of Excellence" or "X Years of Excellence"
        // Target elements that could contain this phrase
        const targetElements = document.querySelectorAll('h1, h2, h3, h4, span, p, div');
        targetElements.forEach(el => {
            // Only update if it contains the pattern and has no elements inside it (to avoid breaking HTML tags)
            if (el.children.length === 0 && /\d+\s+Years\s+of\s+Excellence/i.test(el.textContent)) {
                el.textContent = el.textContent.replace(/\d+\s+Years\s+of\s+Excellence/i, yearsCount + ' Years of Excellence');
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', updateDynamicContent);
    } else {
        updateDynamicContent();
    }
})();
