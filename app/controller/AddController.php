<?php


class AddController  extends BaseController
{
    /**
     * @var ProductRepo
     */
    private $productRepo;

    /**
     * @param ProductRepo $productRepo
     */
    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
    }


    /**
     * Simply shows the add-product form page
     */
    public function index()
    {

        $this->view('add/add_product');

        $this->view->render();
    }

    /**
     * Adds new row to product table
     *
     * @param ProductFactory $productFactory
     */
    public function add($productFactory)
    {
        $this->view('add/add_product');

        $success = true;

        $isSkuUnique = $this->productRepo->isSkuUnique($_POST['sku']);
        $isNameUnique = $this->productRepo->isNameUnique($_POST['name']);

        if (!$isSkuUnique || !$isNameUnique) {
            $success = false;
            if (!$isSkuUnique) {
                $form_error[] = "SKU \"{$_POST['sku']}\" is already taken";
            }
            if (!$isNameUnique) {
                $form_error[] = "Name \"{$_POST['name']}\" is already taken";
            }

            $this->view->render(array(
                'sku' => $_POST['sku'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'form_error' => $form_error,
                'success' => $success
            ));

            exit;
        }

        $product = $productFactory->create($_POST['type']);

        $product->setSku($_POST['sku']);
        $product->setName($_POST['name']);
        $product->setPrice((double) $_POST['price']);
        $product->setAttribute($_POST['attributes']);

        try {
            $this->productRepo->create($product);
        } catch (\Exception $e) {
            $sql_error = $e->getMessage();
            $success = false;
            $this->view->render(array(
                'sql_error' => $sql_error,
                'success' => $success
            ));
            exit;
        }

        $this->view->render(array(
            'success' => $success
        ));
    }
}