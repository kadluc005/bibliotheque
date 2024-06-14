<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Book;

class BookController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Book';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Book());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'));
        $grid->column('title', __('Title'));
        $grid->column('resume', __('Resume'));
        $grid->column('author', __('Author'));
        $grid->column('date', __('Date'));
        $grid->column('disponibilite', __('Disponibilite'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Book::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'));
        $show->field('title', __('Title'));
        $show->field('resume', __('Resume'));
        $show->field('author', __('Author'));
        $show->field('date', __('Date'));
        $show->field('disponibilite', __('Disponibilite'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Book());

        $form->textarea('image', __('Image'));
        $form->text('title', __('Title'));
        $form->textarea('resume', __('Resume'));
        $form->text('author', __('Author'));
        $form->date('date', __('Date'))->default(date('Y-m-d'));
        $form->switch('disponibilite', __('Disponibilite'));

        return $form;
    }
}
