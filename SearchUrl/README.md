
---

# Priyanshu_SearchUrl Module

## 📘 Overview

The **Priyanshu_SearchUrl** module adds functionalities to manage URLs within Magento 2, focusing on handling the URLs for search results and categories. It provides the capability to dynamically generate and display the canonical URLs for the current page based on the search parameters, category, and homepage.

### 🔑 Key Features:
- **Canonical URL Generation**: Automatically generates the canonical URLs for the category and homepage based on the search parameters.
- **Search Result URL Handling**: Handles the URL when a category is passed in the search query.
- **Homepage URL Handling**: Handles the URL for the homepage, ensuring it is correctly displayed.
- **Dynamic URL Updates**: Works seamlessly with Magento's layout system to dynamically update URLs on the front-end.

---

## 🛠️ How It Works

1. **Get Current URL**: The `getCurrentUrl` function fetches the current URL.
2. **Category URL from Search Param**: The `getCategoryUrlFromSearchParam` method retrieves the URL of the category if it is passed as a parameter (`cat`) in the URL.
3. **Homepage URL Handling**: The `getHomepageUrl` method returns the base URL for the homepage.
4. **Canonical URL Injection**: The module injects the canonical link tag into the `<head>` of the page based on the current page, category, or homepage.

---

## 📦 Installation

To install this module in your Magento 2 instance:

1. Clone the repository:

   ```bash
   git clone <repo-url> app/code/Priyanshu/SearchUrl
   ```

2. Enable the module:

   ```bash
   php bin/magento module:enable Priyanshu_SearchUrl
   ```
   
3. Run the following commands to enable the module:

   ```bash
   php bin/magento setup:upgrade
   php bin/magento setup:di:compile
   php bin/magento cache:clean
   php bin/magento cache:flush
   ```

---

## 🔧 Customization

You can customize the functionality and appearance by modifying the following files:

### 1. Modify the Canonical URL Logic

- The logic for generating the category and homepage URLs is located in the file `app/code/Priyanshu/SearchUrl/Block/Url.php`.
- You can add more URL handling logic to accommodate additional search parameters or specific conditions.

### 2. Modify the Layout

If you want to change where the canonical URL is injected, update the layout files:

- Open the file `app/code/Priyanshu/SearchUrl/view/frontend/layout/catalogsearch_result_index.xml` or `cms_index_index.xml`.
- Modify the layout or add new blocks if required.

### 3. Modify the Template

The template that renders the canonical link tag is located at `app/code/Priyanshu/SearchUrl/view/frontend/templates/current_url.phtml`. You can modify the HTML structure or add additional metadata tags.

For example, to add more metadata:

```php
<meta property="og:title" content="<?= $block->escapeHtml($block->getPageTitle()); ?>" />
<meta property="og:description" content="<?= $block->escapeHtml($block->getPageDescription()); ?>" />
```

---

## 🌐 Frontend Appearance

Once the module is installed, it will automatically manage the canonical URL for search results, category pages, and the homepage. The canonical URL will be injected into the `<head>` section of the page:

### Example Canonical URL for Search Result Page:
```html
<link rel="canonical" href="https://www.example.com/category-url" />
```

### Example Canonical URL for Homepage:
```html
<link rel="canonical" href="https://www.example.com" />
```

---

## 🛠️ Troubleshooting

If the canonical URL is not displaying correctly:

1. Clear Magento caches:

   ```bash
   php bin/magento cache:clean
   php bin/magento cache:flush
   ```

2. Ensure that you're in **developer mode** when making changes to the templates or layout files.
3. Check for errors in the `var/log/system.log` or `var/log/exception.log` files.

---

## 🌱 Contribution

Feel free to fork this repository and create pull requests if you have any improvements or fixes. When contributing, ensure your code follows the Magento 2 coding standards.

---

### 🔗 License

This module is open-source, and you are welcome to modify it according to your business needs.

---

### 📧 Contact Information

For more details, or need any further customization, feel free to **connect with me** at **[davepriyanshu2001@gmail.com](mailto:davepriyanshu2001@gmail.com)**. I'm happy to assist you!

---
