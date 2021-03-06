<?php

/**
 * PageController class
 */
class PageController extends Controller
{
    /**
     * generates nav bar and page content from Template class
     *
     * @return string
     */
    public function render(): string
    {
        $pages = json_decode(file_get_contents(DATA_DIR . "pages.json"), true);
        $aTmplt = new Template("a.html");
        $nav = "";
        foreach ($pages as $key => $val) {
            if ($key == "404") {
                continue;
            }
            $nav .= $aTmplt->data([
                'class' => $this->page == $key ? 'active' : '',
                'href' => $key,
                'label' => $val
            ])->render();
        }
        return (new Template("page.html"))
            ->data([
                'base' => URL . URL_DIR,
                'title' => ($this->page == "home" ? "" : $pages[$this->page] . " | ") . "Mia Games",
                'nav' => $nav,
                'content' => file_get_contents(DATA_DIR . "$this->page.html")
            ])
            ->render();
    }
}