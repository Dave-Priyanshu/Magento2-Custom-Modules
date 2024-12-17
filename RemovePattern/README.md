
---

# Priyanshu_RemovePattern Module

## 📘 Overview

The **Priyanshu_RemovePattern** module is designed to automatically clean the product URL keys in Magento 2 by removing unwanted patterns and words. This ensures that when a new product is created, its URL key is SEO-friendly and does not contain undesired words such as **nikko**, **uk**, **since1983**, **company**, and **87**.

### 🔑 Key Features:
- Automatically removes unwanted words from the product URL key.
- Cleans up the URL by:
  - Replacing spaces with hyphens.
  - Removing unwanted words.
  - Removing multiple hyphens.
  - Converting the URL key to lowercase.
- Works only for new products, ensuring that previously created products remain unaffected.

---

## 🛠️ How It Works

1. When a new product is created and saved in Magento, the module listens to the `catalog_product_save_before` event.
2. The observer checks the product name or URL key and removes unwanted words such as:
   - **nikko**
   - **uk**
   - **company**
   - **since1983**
   - **87**
3. The module then:
   - Replaces spaces in the product name with hyphens (`-`).
   - Cleans up multiple consecutive hyphens.
   - Converts the URL key to lowercase.
4. The final cleaned URL key is then saved for the product.

### 💡 Example:

- **Original Product Name**: `TESTING TRANSISTOR nikko uk since-1983-nikko-87`
- **Generated URL Key**: `testing-transistor`

---

## 📦 Installation

To install this module in your Magento 2 instance:

1. Clone the repository:

   ```bash
   git clone <repo-url> app/code/Priyanshu/RemovePattern
   ```

2. Run the following commands to enable the module:

   ```bash
   php bin/magento setup:upgrade
   php bin/magento setup:di:compile
   php bin/magento cache:clean
   php bin/magento cache:flush
   ```

3. Ensure the module is properly enabled:

   ```bash
   php bin/magento module:enable Priyanshu_RemovePattern
   ```

---

## 🔧 Customization

If you want to adjust the code to remove different words or change the behavior of the URL cleaning, follow these steps:

### 1. Adjust the List of Unwanted Words

- Open the file `app/code/Priyanshu/RemovePattern/Observer/ProductSaveBefore.php`.
- Locate the following code where the unwanted words are defined:

  ```php
  $unwantedWords = ['uk', 'company', 'since1983', 'nikko', '87'];
  ```

- Add or remove words from this array as needed. For example, to remove **"example"** and **"test"**:
  
  ```php
  $unwantedWords = ['uk', 'company', 'since1983', 'nikko', '87', 'example', 'test'];
  ```

### 2. Modify the URL Key Cleanup Logic

If you want to change how the URL key is cleaned (e.g., changing hyphens to underscores or removing more patterns), you can adjust the following code in the observer:

```php
// Clean up the URL key.
$urlKey = preg_replace('/\s+/', '-', $urlKey); // Replace spaces with hyphens.
$urlKey = preg_replace('/-+/', '-', $urlKey);  // Remove multiple hyphens.
$urlKey = strtolower(trim($urlKey, '-'));     // Trim and convert to lowercase.
```

- Modify the regular expressions or logic to fit your needs.

### 3. Handling Existing Products

Currently, this module only affects new products. If you want to apply this change to **existing products**, you can either:
- Manually update the URL keys for existing products.
- Or, modify the code to listen for the `catalog_product_save_after` event and process all products, not just new ones.

---

## 🛠️ Troubleshooting

If the module is not working as expected:
1. Ensure that your Magento instance is in developer mode.
2. Check for any error messages in `var/log/system.log` or `var/log/exception.log`.
3. Ensure that all cache is cleared after enabling the module:
   
   ```bash
   php bin/magento cache:clean
   php bin/magento cache:flush
   ```

---

## 🌱 Contribution

Feel free to fork this repository and create pull requests if you have any improvements or fixes. When contributing, ensure your code follows the Magento 2 coding standards and includes relevant tests.

---
