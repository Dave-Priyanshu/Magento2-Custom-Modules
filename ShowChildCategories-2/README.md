
# Priyanshu Show Child Categories Magento 2 Module

The **Priyanshu_ShowChildCategories** Magento 2 module extends the default category functionality by providing an easy way to display immediate child categories on the frontend category view page. It leverages a custom attribute (`show_child_categories`) to enable or disable this feature on a per‑category basis, making it simple to control child category display directly from the Magento admin panel.

---

## Features 🔍

- **Immediate Child Categories Display:**  
  Only the immediate child categories are displayed, enabling customers to quickly navigate to subcategories.

- **Admin Toggle Attribute:**  
  The module adds a custom attribute (`show_child_categories`) to the category form, allowing you to easily toggle the display of child categories.

- **Custom Frontend Template:**  
  A custom block and template render the child categories. Inline CSS is provided for styling, but since styling is subjective and project‑dependent, the CSS is not separated. If you need the CSS used or further customization, please connect with me.

---

## Installation 🔧

1. **Place Module Files:**  
   Copy the module directory to your Magento 2 codebase at:
   ```
   app/code/Priyanshu/modules/ShowChildCategories
   ```

2. **Enable the Module:**  
   Run the following commands from the Magento root directory:
   ```bash
   php bin/magento module:enable Priyanshu_ShowChildCategories
   php bin/magento setup:upgrade
   php bin/magento setup:di:compile
   php bin/magento cache:flush
   ```

3. **Reindex (if necessary):**
   ```bash
   php bin/magento indexer:reindex
   ```

---

## Module Structure 📁

```
Priyanshu/
└── modules/
    └── ShowChildCategories/
        ├── Block/
        │   └── Category/
        │       └── SubcategoryList.php         # Block class that retrieves category data and immediate child categories.
        ├── etc/
        │   └── module.xml                      # Module declaration file.
        ├── Setup/
        │   └── Patch/
        │       └── Data/
        │           └── AddShowChildCategoriesAttribute.php   # Data patch to add the "show_child_categories" attribute.
        ├── registration.php                    # Module registration file.
        ├── view/
        │   ├── adminhtml/
        │   │   └── ui_component/
        │   │       └── category_form.xml       # Extends the Magento category form to include the toggle attribute.
        │   └── frontend/
        │       ├── layout/
        │       │   └── catalog_category_view.xml  # Adds the custom block to the category view page.
        │       └── templates/
        │           └── custom-category-content.phtml  # Custom template for displaying category details and child categories.
```

---

## How It Works 🚀

- **Block Functionality:**  
  The `SubcategoryList` block retrieves the current category, its immediate child categories, and associated data (such as name, image, and description). It also generates HTML to render the child categories.

- **Admin Panel Integration:**  
  A custom attribute (`show_child_categories`) is added to the Magento category form via the UI component XML file, enabling you to control the display of child categories from the admin.

- **Frontend Rendering:**  
  The custom template (`custom-category-content.phtml`) checks if the `show_child_categories` attribute is enabled for the current category. If enabled, it renders the category details and a list of immediate child categories along with inline CSS for styling.

- **Custom Styling:**  
  Styling is applied via inline CSS in the template file. Since style preferences vary between projects, the CSS is not provided as a separate file. If you need the CSS or further styling customizations, please get in touch.

---

## Customization & Usage 🛠️

- **Toggle Display:**  
  To display immediate child categories on a category page, edit the desired category in the Magento admin and set the **Show Child Categories** toggle to `Yes`.

- **Template Adjustments:**  
  You can modify the HTML and CSS within the `custom-category-content.phtml` file to better match your store’s design.

- **Block Methods:**  
  The block includes several helper methods (for fetching category details, images, and child categories) which can be used for additional customizations.

---

## Troubleshooting ⚠️

- **Attribute Not Showing:**  
  If the **Show Child Categories** attribute does not appear in the admin, ensure you have run:
  ```bash
  php bin/magento setup:upgrade
  ```

- **Child Categories Not Displaying:**  
  Verify that the current category has the `show_child_categories` attribute enabled and that it actually has child categories.

- **Cache Issues:**  
  After making changes, clear Magento caches with:
  ```bash
  php bin/magento cache:flush
  ```

---

Feel free to contribute or reach out if you have any questions or suggestions!

