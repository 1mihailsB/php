<?php

class HomeController extends BaseController
{
    /**
     * @var ProductRepo
     */
    private $productRepo;

    /**
     * @param ProductRepo $repository
     */
    public function __construct($repository)
    {
        $this->productRepo = $repository;
    }

    public function index($productFactory)
    {
        $products = $this->productRepo->getAllProductsObj($productFactory);

        $this->view('home/home');

        $this->view->render(array(
            'products' => $products
        ));
    }

    /**
     * delete all products with ID present in incoming $ids array
     */
    public function delete()
    {
        // mark an attempt to delete products in session and redirect to homepage, which will be processed by
        // this controller's index() method. Redirecting in order to not duplicate functionality of index() method
        session_start();
        header('Location: ' . BASE_URL);

        $_SESSION['delete_attempt'] = true;

        if (empty($_POST['delete_items'])) {
            exit;
        }

        // using POST method so I don't have to create my own $_DELETE global variable just for this test assignment
        $ids = array_map('intval', $_POST['delete_items']);

        try {
            //if 'deleted' is set, then items were deleted successfully
            $_SESSION['deleted'] = true;
            $this->productRepo->deleteAllById($ids);
        } catch (\Exception $e) {
            $_SESSION['$sql_error'] = $e->getMessage();
            //if 'deleted' is not set, then delete failed
            unset($_SESSION['deleted']);
        }
    }
}