```markdown
# Priyanshu Hide Category Elements Module

[![Magento 2](https://img.shields.io/badge/Magento-2.x-blue)](https://magento.com) [![PHP](https://img.shields.io/badge/PHP-7.3%2B-blue)](https://php.net)

This Magento 2 module provides a simple way to selectively hide certain category elements (such as the page title, category image, or category description) on the frontend. It lets you control the appearance of category pages without affecting other parts of the site.

---

## Overview :eyes:
The module adds a new multi-select attribute **Hide Category Elements** to the category edit form in the Magento admin. When enabled, it generates custom CSS that hides the selected elements on the frontend category page. This approach is non-intrusive and ensures that the module's functionality is scoped only to category pages.

---

## Features :sparkles:
- **Selective Hiding:** Choose which category elements to hide (page title, image, or description).
- **Multi-Select Capability:** Use **Shift+Click** to select multiple options.
- **Easy Deselection:** Deselect options using **Ctrl+Right Click**.
- **Non-Intrusive:** The module affects only the category view, leaving the rest of the site unchanged.

---

## Installation :wrench:
1. **Clone or Download the Module:**
   ```bash
   git clone https://github.com/your-repository/Priyanshu_HideCategoryElements.git
   ```
2. **Copy to Magento:**
   Copy the module folder to `app/code/Priyanshu/HideCategoryElements` in your Magento installation.
3. **Enable the Module:**
   From your Magento root directory, run:
   ```bash
   php bin/magento module:enable Priyanshu_HideCategoryElements
   php bin/magento setup:upgrade
   php bin/magento cache:flush
   ```
4. **Deploy Static Content (if necessary):**
   ```bash
   php bin/magento setup:static-content:deploy
   ```

---

## Configuration :gear:
After installation, follow these steps to configure the module:

- **Navigate to Categories:** In the Magento Admin, open any category for editing.
- **Locate the Field:** Under the **General** tab, find the **Hide Category Elements** field.
- **Select Options:**  
  - **When an option is selected:** The corresponding element on the category page (page title, image, or description) will be hidden.
  - **Multiple Selection:** Use **Shift+Click** to select multiple options.
  - **Deselect Options:** Use **Ctrl+Right Click** to remove a selected option.

The module will generate and inject the appropriate CSS into the category page, applying `display: none;` to the chosen elements.

---

## How It Works :bulb:
1. **Attribute Addition:**
   - A data patch adds the `hide_category_elements` attribute to the category entity.
   - The attribute is set up as a multi-select field in the admin panel.

2. **CSS Generation:**
   - The `HideElements` block retrieves the current category’s attribute value.
   - It then generates CSS rules (e.g., `#page-title-heading { display: none; }`) based on the selected options.

3. **Layout Integration:**
   - A layout XML file injects the block and its template into the `head.additional` container on the category view page.
   - This ensures that the custom CSS is applied only on category pages.

---

## Screenshots :camera:
*Include screenshots of the admin configuration and frontend changes if available.*

---

## Contributing :handshake:
Contributions are welcome! Please fork this repository and submit a pull request with your improvements or bug fixes.

---

## License :page_facing_up:
This project is licensed under the [MIT License](LICENSE).

---

## Support :telephone_receiver:
If you encounter any issues or have questions, please open an issue on this repository.

Happy coding! :rocket:
```