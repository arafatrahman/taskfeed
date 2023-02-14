<?php

class View{

/*  $viewData is sent from the controller, it contains all of the data needed
*   for the view, including what i call the "view settings" as described above */
public function __construct($viewData){

    //Instantiate a new error for this view (error handling class)
    $this->err = new ErrorClass(get_class($this));

    //Instantiate a new helper (helper functions used in the view)
    $this->helpers = new ViewHelpers();

    /* Save variables from the $viewData array */

    //If a single file was sent to render (receives the file name and is rendered later)
    $this->viewFile     = $viewData['view_file'];

    //If a whole page was sent to be rendered (this will render the whole template also)
    $this->viewName     = $viewData['view_name'];

    //Template data, only used if a whole page should be rendered
    $this->templateData = $viewData['template_data'];

    //The data for the view, e.g. post data
    $this->viewData     = $viewData['view_data'];

    //Call the render view method
    $this->renderView();
}



/* Function to render the view output
===============================================*/
private function renderView(){

    //If a single file should be rendered
    if($this->viewFile && file_exists(VIEWS_PATH.$this->viewFile)){
        require(VIEWS_PATH.$this->viewFile);


    //If a whole page should be rendered
    }elseif($this->viewName && file_exists(TEMPLATE_FILE_PATH)){
        require(TEMPLATE_FILE_PATH);


    //Save an error
    }else{
        echo 'Oops, something went wrong, we are looking into it!';
        $this->err->setError(array('err_cat' => 3, 'err_msg' => "View wasn't able to load"));
    }
}
}