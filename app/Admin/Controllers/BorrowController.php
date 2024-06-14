<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Borrow;

class BorrowController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Borrow';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Borrow());

        $grid->column('id', __('Id'));
        $grid->column('book_id', __('Book id'));
        $grid->column('borrowed_at', __('Borrowed at'));
        $grid->column('due_at', __('Due at'));
        $grid->column('returned_at', __('Returned at'));
        $grid->column('user_id', __('User id'));
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
        $show = new Show(Borrow::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('book_id', __('Book id'));
        $show->field('borrowed_at', __('Borrowed at'));
        $show->field('due_at', __('Due at'));
        $show->field('returned_at', __('Returned at'));
        $show->field('user_id', __('User id'));
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
        $form = new Form(new Borrow());

        $form->number('book_id', __('Book id'));
        $form->date('borrowed_at', __('Borrowed at'))->default(date('Y-m-d'));
        $form->date('due_at', __('Due at'))->default(date('Y-m-d'));
        $form->date('returned_at', __('Returned at'))->default(date('Y-m-d'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
