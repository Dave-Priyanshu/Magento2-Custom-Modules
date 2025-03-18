<?php
namespace Priyanshu\ShowChildCategories\Block\Category;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Helper\Image;
use Magento\Catalog\Api\CategoryRepositoryInterface;

class SubcategoryList extends Template
{
    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var CategoryFactory
     */
    protected $categoryFactory;

    /**
     * @var Image
     */
    protected $imageHelper;

    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param Registry $registry
     * @param CategoryFactory $categoryFactory
     * @param Image $imageHelper
     * @param CategoryRepositoryInterface $categoryRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Registry $registry,
        CategoryFactory $categoryFactory,
        Image $imageHelper,
        CategoryRepositoryInterface $categoryRepository,
        array $data = []
    ) {
        // Save the injected dependencies to class properties.
        $this->registry = $registry;
        $this->categoryFactory = $categoryFactory;
        $this->imageHelper = $imageHelper;
        $this->categoryRepository = $categoryRepository;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve the current category from the registry.
     *
     * @return \Magento\Catalog\Model\Category|null
     */
    public function getCurrentCategory()
    {
        return $this->registry->registry('current_category');
    }

    /**
     * Get the current category name.
     *
     * @return string
     */
    public function getCategoryName()
    {
        $category = $this->getCurrentCategory();
        return $category ? $category->getName() : '';
    }

    /**
     * Get the current category image URL using the image helper.
     *
     * If the category has an image, this method initializes it with the 
     * 'category_page_grid' image role and returns its URL.
     *
     * @return string
     */
    public function getCategoryImage()
    {
        $category = $this->getCurrentCategory();
        if ($category && $category->getImageUrl()) {
            return $this->imageHelper->init($category, 'category_page_grid')->getUrl();
        }
        return '';
    }

    /**
     * Get a specific category's image URL by its ID.
     *
     * Loads the category using the CategoryFactory and returns its image URL.
     * If the category does not have an image or fails to load, it returns false.
     *
     * @param int $categoryId
     * @return string|false
     */
    public function getCategoryImageUrl($categoryId)
    {
        try {
            $category = $this->categoryFactory->create()->load($categoryId);
            if ($category->getImage()) {
                return $category->getImageUrl();
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get child categories for the current category.
     *
     * Returns the collection of direct child categories.
     *
     * @return \Magento\Catalog\Model\ResourceModel\Category\Collection|array
     */
    public function getChildCategories()
    {
        $currentCategory = $this->getCurrentCategory();
        return $currentCategory ? $currentCategory->getChildrenCategories() : [];
    }

    /**
     * Generate HTML for a subcategory list.
     *
     * Loops through child categories of the given category and builds HTML
     * for each one. This is used to render subcategory lists (non-recursive version).
     *
     * @param \Magento\Catalog\Model\Category $category
     * @return string
     */
    public function getSubCategoryList($category)
    {
        $subCategories = $category->getChildrenCategories();
        $subCategoryHtml = '';
        if (count($subCategories) > 0) {
            foreach ($subCategories as $subCategory) {
                $subCategoryHtml .= '<li class="item">';
                $subCategoryHtml .= '<a class="anchors" href="' . $subCategory->getUrl() . '">';
                $subCategoryHtml .= '<span class="arrow">➔</span>';
                $subCategoryHtml .= '<span class="title">' . $subCategory->getName() . '</span>';
                $subCategoryHtml .= '</a>';
                $subCategoryHtml .= '</li>';
            }
        }
        return $subCategoryHtml;
    }

    /**
     * Get the description for a given category by its ID.
     *
     * Utilizes the CategoryRepository to load the category and returns its description.
     * If the description is not available, a default message is returned.
     *
     * @param int $categoryId
     * @return string
     */
    public function getCategoryDescription($categoryId)
    {        
        $category = $this->categoryRepository->get($categoryId);
        return $category->getDescription() ?: '';

    }

}
