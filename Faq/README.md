
---

# Priyanshu_Faq Module

## 📘 Overview

The **Priyanshu_Faq** module adds a **Frequently Asked Questions (FAQ)** section to the product page in Magento 2. This allows customers to view important information about the product directly from the product detail page. The module is flexible, enabling you to easily add and manage FAQ data for each product.

### 🔑 Key Features:
- Adds a **FAQ** tab to the product page.
- Displays a list of questions and answers for each product.
- Customizable FAQ data: easily extendable with additional questions and answers.
- Simple and clean styling via custom CSS.

---

## 🛠️ How It Works

1. **Add FAQ Tab to Product Pages**: The module listens for the `catalog_product_view` layout and adds a new **FAQ** block to the product detail page after the reviews section.
2. **Display FAQ Data**: The FAQ block pulls data from the `Faq.php` block class and displays it on the product page.
3. **Customizable FAQ Content**: You can modify the FAQ content by editing the `getFaqData()` method inside `Faq.php`. This allows you to easily add or remove questions and answers as needed.

### 💡 Example:

- **Question**: What is the warranty period?
- **Answer**: The warranty period is 1 year.

---

## 📦 Installation

To install this module in your Magento 2 instance:

1. Clone the repository:

   ```bash
   git clone <repo-url> app/code/Priyanshu/Faq
   ```

2. Run the following commands to enable the module:

   ```bash
   php bin/magento setup:upgrade
   php bin/magento setup:di:compile
   php bin/magento cache:clean
   php bin/magento cache:flush
   ```

3. Enable the module:

   ```bash
   php bin/magento module:enable Priyanshu_Faq
   ```

---

## 🚀 Updated Version (Pro Version)

### Overview of the Pro Version

The **Pro Version** of the **Priyanshu_Faq** module adds advanced functionality for managing FAQs dynamically based on the **first letter of the product name**. This feature allows you to display different FAQs tailored to each product, based on the starting letter of the product's name. This enables a more organized and relevant FAQ section for users, especially for products with large amounts of FAQ data.

### Key Features of the Pro Version:
- **Dynamic FAQ Display**: FAQ questions and answers are displayed based on the first letter of the product’s name (e.g., if the product starts with 'A', FAQs specific to that letter will be shown).
- **Predefined FAQ Categories**: A set of predefined FAQs for each letter of the alphabet (e.g., 'A', 'B', 'C', etc.) along with customizable questions and answers.
- **Customizable FAQ Content**: Easily manage and modify FAQ content for each product based on its starting letter.
- **Improved User Experience**: Tailors FAQs to specific products, making the content more relevant for the customer.

### Example:

For a product starting with the letter **'A'**, it will display FAQs like:
- **What are the common applications of [Product name]?**
- **How do I choose the right [Product name] for my project?**
- **Are [Product name] available in different sizes?**

For a product starting with the letter **'B'**, it will display FAQs like:
- **What are the key features of [Product name]?**
- **Is [Product name] available?**
- **What maintenance is required for [Product name]?**

You can easily add more questions for each letter or modify the existing ones.

This version is perfect for stores with a wide variety of products, each requiring detailed and specific FAQ content.


## 🔧 Customization

You can easily customize the FAQ data or the styling by editing the following files:

### 1. Add or Remove FAQ Questions

- Open the file `app/code/Priyanshu/Faq/Block/Faq.php`.
- Modify the `getFaqData()` function to add new questions or remove old ones:

  ```php
  public function getFaqData()
  {
      return [
          ['question' => 'What is the warranty period?', 'answer' => 'The warranty period is 1 year.'],
          ['question' => 'Can I return this product?', 'answer' => 'Yes, you can return within 30 days of purchase.'],
          ['question' => 'Is this product available in different colors?', 'answer' => 'Yes, we have multiple colors available.']
      ];
  }
  ```

- Add a new question:
  
  ```php
  ['question' => 'Is free shipping available?', 'answer' => 'Yes, free shipping is available on orders over $50.']
  ```

- Remove an existing question by deleting the corresponding array item.

### 2. Modify the FAQ Section Layout

If you want to change where the FAQ tab appears or modify its layout:
- Open the file `app/code/Priyanshu/Faq/view/frontend/layout/catalog_product_view.xml`.
- Update the `<block>` tag to change the location or appearance of the FAQ section.

For example, to move it to a different section of the page:
  
```xml
<referenceContainer name="product.info.additional">
    <block class="Priyanshu\Faq\Block\Faq" name="product.faq.tab" template="Priyanshu_Faq::product/view/faq.phtml" />
</referenceContainer>
```

### 3. Modify the FAQ Section Styling

To change the look and feel of the FAQ section:

- Open the file `app/code/Priyanshu/Faq/view/frontend/web/css/faq.css`.
- Modify the CSS properties to adjust the design of the FAQ section (e.g., change border color, font size, or spacing).

For example, to change the header color:

```css
.faq-section h2 {
    color: #333;
}
```

---

## 🌐 Frontend Appearance

Once the module is installed and FAQs are added, the FAQ section will appear on the product page, displaying a list of questions and answers.

### Example Display:

#### Frequently Asked Questions
- **Question**: What is the warranty period?
  - **Answer**: The warranty period is 1 year.
- **Question**: Can I return this product?
  - **Answer**: Yes, you can return within 30 days of purchase.
- **Question**: Is this product available in different colors?
  - **Answer**: Yes, we have multiple colors available.

---

## 🛠️ Troubleshooting

If the FAQ section is not showing up or not working as expected:

1. Clear Magento caches:

   ```bash
   php bin/magento cache:clean
   php bin/magento cache:flush
   ```

2. Ensure you are in **developer mode** if making changes to the template or layout files.
3. Check for errors in the `var/log/system.log` or `var/log/exception.log` files.

---

## 🌱 Contribution

Feel free to fork this repository and create pull requests if you have any improvements or fixes. When contributing, ensure your code follows the Magento 2 coding standards.

---

### 🔗 License

This module is open-source, and you are welcome to modify it according to your business needs.

---

### 📧 Contact Information

For more details, or if you're interested in purchasing the Updated module or need further customization, feel free to **connect with me** at **[davepriyanshu2001@gmail.com](mailto:davepriyanshu2001@gmail.com)**. I'm happy to assist you!

---
