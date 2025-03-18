
# Priyanshu Show Child Categories Magento 2 Module

The **Priyanshu_ShowChildCategories** module extends Magento 2’s category functionality by providing a way to display child categories on the frontend category view. In addition to rendering subcategories recursively, it introduces two custom attributes that let you control whether to show child categories and define the maximum depth for recursive category display.

---

## Features 🔍

- **Frontend Display of Child Categories:**  
  Render a list of child categories on category pages using a recursive function with configurable depth.

- **Custom Category Attributes:**  
  - **Show Child Categories:** A toggle (boolean) attribute that allows enabling or disabling the display of child categories on the frontend.  
  - **Maximum Child Depth:** An integer attribute used to set the maximum recursion level for displaying child categories.

- **Admin Panel Integration:**  
  The module extends the default category form in the Magento admin to include the new attributes for easy configuration.

---

## Installation 🔧

1. **Copy Module Files:**  
   Place the module directory into your Magento 2 code base at:  
   `app/code/Priyanshu/ShowChildCategories`

2. **Enable the Module:**  
   Run the following commands from the Magento root directory:
   ```bash
   php bin/magento module:enable Priyanshu_ShowChildCategories
   php bin/magento setup:upgrade
   php bin/magento setup:di:compile
   php bin/magento cache:flush
   ```

3. **Reindex (if needed):**  
   If necessary, run:
   ```bash
   php bin/magento indexer:reindex
   ```

---

## Module Structure 📁

```
Priyanshu/
└── ShowChildCategories/
    ├── Block/
    │   └── Category/
    │       └── SubcategoryList.php         # Block class with helper methods to render categories.
    ├── etc/
    │   └── module.xml                      # Module declaration file.
    ├── Setup/
    │   └── Patch/
    │       └── Data/
    │           ├── AddMaxChildDepthAttribute.php    # Data patch to add "max_child_depth" attribute.
    │           └── AddShowChildCategoriesAttribute.php  # Data patch to add "show_child_categories" attribute.
    ├── registration.php                    # Module registration file.
    ├── view/
    │   ├── adminhtml/
    │   │   └── ui_component/
    │   │       └── category_form.xml       # Extends the category form in the admin panel.
    │   └── frontend/
    │       ├── layout/
    │       │   └── catalog_category_view.xml  # Adds the custom block to the category view page.
    │       └── templates/
    │           ├── custom-category-content.phtml  # Primary template for rendering the current category and its child categories.
    │           └── custom-subcategory-list.phtml  # Alternative template for listing subcategories.
```

---

## How It Works 🚀

### Block: SubcategoryList.php

- **Retrieving Current Category Data:**  
  Methods like `getCurrentCategory()`, `getCategoryName()`, and `getCategoryImage()` fetch details of the currently viewed category.

- **Rendering Child Categories:**  
  The method `getChildCategories()` retrieves direct child categories, and a custom recursive function in the template (e.g., `renderSubCategoryList`) renders subcategories up to the depth defined by the **max_child_depth** attribute.

- **Custom Attribute Usage:**  
  The block method `getCategoryMaxDepth()` retrieves the per‑category maximum depth setting that controls recursive rendering of child categories.

### Admin Panel Customization

- **UI Component:**  
  The file `view/adminhtml/ui_component/category_form.xml` merges into the default category form. It adds:
  - A checkbox field for **Show Child Categories**.
  - A number input field for **Maximum Child Depth**.
  
  These settings let administrators easily control category display on the frontend.

### Frontend Rendering

- **Layout XML:**  
  The layout file `catalog_category_view.xml` places the custom block (`Priyanshu\ShowChildCategories\Block\Category\SubcategoryList`) into the page content area.

- **Templates:**  
  - **custom-category-content.phtml:**  
    Displays the current category’s title, description, and an image (if available). It uses a recursive function to render the child category tree, respecting the maximum depth setting.
    
  - **custom-subcategory-list.phtml:**  
    Provides an alternative (non-recursive) rendering of the subcategory list.

---

## Alternative Version 📦

I have also created another version of this module (available at [Git Repo Link](https://github.com/yourusername/another-magento2-child-categories)) where **only the immediate subcategories** are displayed (non-recursive). 

**Note on Styling:**  
The CSS styling is not included because style is a very subjective matter and can vary from project to project. If you need the CSS that I have used, please feel free to connect with me.

---

## Customization & Usage 🛠️

- **Display Control:**  
  To show child categories on a category page, edit the category in the Magento admin and set the **Show Child Categories** toggle to `Yes`.

- **Depth Setting:**  
  Use the **Maximum Child Depth** field to limit the recursive display of subcategories. For example, setting a depth of `2` will render subcategories up to two levels deep.

- **Template Adjustments:**  
  Developers can customize the HTML structure and styling in the provided `.phtml` files to better match the store’s theme.

- **Block Methods:**  
  The block class provides several helper methods (e.g., for retrieving category images and descriptions) that can be used within custom templates.

---

## Troubleshooting ⚠️

- **Attributes Not Visible in Admin:**  
  Ensure that you have run the `setup:upgrade` command after module installation.

- **Child Categories Not Displaying:**  
  Verify that the **Show Child Categories** attribute is enabled for the current category and that child categories exist.

- **Cache Issues:**  
  Flush Magento caches after any changes to templates or configurations using:
  ```bash
  php bin/magento cache:flush
  ```

---

By following the steps above, you should have the **Priyanshu_ShowChildCategories** module installed and ready to enhance your Magento 2 storefront with dynamic child category displays.

---

Feel free to contact me if you need the CSS styles or any further customizations!
