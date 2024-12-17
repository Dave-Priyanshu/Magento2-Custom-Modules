
---

# Priyanshu_OgTags Module for Magento 2

## 🚀 Overview

The **Priyanshu_OgTags** module enhances your Magento 2 store by adding Open Graph (OG) and Twitter Card meta tags to the homepage and category pages. This allows you to improve the visibility and appearance of your pages when shared on social media platforms like Facebook and Twitter. It automatically generates metadata based on the page content, such as title, description, and URL, to optimize your pages for social media sharing.

---

## 📦 Key Features

- **Open Graph Tags**: Automatically generates and injects Open Graph meta tags for better social media integration.
- **Twitter Card Tags**: Adds Twitter Card meta tags to your pages for enhanced visibility when shared on Twitter.
- **Homepage Integration**: Adds OG and Twitter tags for the homepage with dynamic content based on the page title and description.
- **Category Page Integration**: Adds OG and Twitter tags for category pages, using dynamic content like category name, description, and URL.

---

## 🛠️ Installation Instructions

### Step 1: Clone the Repository

Clone the **Priyanshu_OgTags** module repository into your Magento 2 project:

```bash
git clone <repo-url> app/code/Priyanshu/OgTags
```

### Step 2: Enable the Module

Run the following commands to enable the module:

```bash
php bin/magento module:enable Priyanshu_OgTags
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:clean
php bin/magento cache:flush
```

### Step 3: Deploy Static Content (if required)

```bash
php bin/magento setup:static-content:deploy
```

---

## 📑 Configuration

The module doesn't require any manual configuration. It automatically adds the necessary Open Graph and Twitter Card meta tags to the homepage and category pages based on the page data.

---

## 🧑‍💻 How It Works

The **Priyanshu_OgTags** module adds Open Graph and Twitter Card meta tags to the `<head>` section of your page using the following blocks and templates:

1. **Homepage** (`cms_index_index`):
   - The **Home.php** block retrieves the page title, description, and URL.
   - The **home.phtml** template renders Open Graph and Twitter Card tags for the homepage.

2. **Category Page** (`catalog_category_view`):
   - The **Category.php** block retrieves the current category name, description, and URL.
   - The **category.phtml** template renders Open Graph and Twitter Card tags for category pages.

These tags help improve the appearance and metadata when the page is shared on social media platforms like Facebook and Twitter.

---

## 🖥️ Template Files

### 🏠 Homepage Template (`home.phtml`)

The **home.phtml** file is responsible for rendering the Open Graph and Twitter Card tags for the homepage:

```php
<?php if ($block->getPageTitle()): ?>
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?= $block->escapeHtml($block->getPageTitle()); ?>" />
    <meta property="og:description" content="<?= $block->escapeHtml($block->getPageDescription() ); ?>" />
    <meta property="og:url" content="<?= $block->escapeHtml($block->getPageUrl()); ?>" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= $block->escapeHtml($block->getPageTitle()); ?>" />
    <meta name="twitter:description" content="<?= $block->escapeHtml($block->getPageDescription()); ?>" />
    <meta name="twitter:url" content="<?= $block->escapeHtml($block->getPageUrl()); ?>" />
<?php endif; ?>
```

This will inject the following tags for the homepage:

- `og:title`
- `og:description`
- `og:url`
- `og:type`
- `twitter:title`
- `twitter:description`
- `twitter:url`

### 🏷️ Category Template (`category.phtml`)

The **category.phtml** file is responsible for rendering the Open Graph and Twitter Card tags for category pages:

```php
<?php if ($block->getCategory()): ?>
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?= $block->escapeHtml($block->getCategoryName()); ?>" />
    <meta property="og:description" content="<?= $block->escapeHtml($block->getCategoryDescription()); ?>" />
    <meta property="og:url" content="<?= $block->escapeHtml($block->getCategoryUrl()); ?>" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= $block->escapeHtml($block->getCategoryName()); ?>" />
    <meta name="twitter:description" content="<?= $block->escapeHtml($block->getCategoryDescription()); ?>" />
    <meta name="twitter:url" content="<?= $block->escapeHtml($block->getCategoryUrl()); ?>" />
<?php endif; ?>
```

This will inject the following tags for category pages:

- `og:title`
- `og:description`
- `og:url`
- `og:type`
- `twitter:title`
- `twitter:description`
- `twitter:url`

---

## 🧩 Customization

If you want to customize the meta tags further, you can update the **home.phtml** and **category.phtml** templates or modify the corresponding block classes:

1. **Home.php**: Customize how the homepage title, description, and URL are retrieved.
2. **Category.php**: Modify how the category's name, description, and URL are fetched.

---

## 🔧 Troubleshooting

If the Open Graph or Twitter Card tags are not appearing as expected:

1. Clear Magento's cache:

   ```bash
   php bin/magento cache:clean
   php bin/magento cache:flush
   ```

2. Ensure that your page is fully indexed and visible to the public.
3. Check for any conflicting extensions that might be overriding the `<head>` section of your pages.

---

## 👥 Contact Information

For any inquiries or issues, please contact me at **[priyanshu123@gmail.com](mailto:priyanshu123@gmail.com)**. I will be happy to assist you!

---

## 🔑 License

This module is open-source and free to use. You are welcome to modify it according to your business needs.

---

Let me know if you need further adjustments or explanations! 😊
