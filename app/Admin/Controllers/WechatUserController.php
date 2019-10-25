<?php

namespace App\Admin\Controllers;

use App\Models\WechatUser;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class WechatUserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\WechatUser';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WechatUser);

        $grid->column('id', __('ID'));
        $grid->column('nick_name', __('昵称'));
        $grid->column('name', __('用户名'));
        $grid->column('password', __('密码'));
        $grid->column('mobile', __('手机号'));
        $grid->column('mini_program_open_id', __('OpenId'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));

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
        $show = new Show(WechatUser::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('nick_name', __('昵称'));
        $show->field('name', __('用户名'));
        $show->field('password', __('密码'));
        $show->field('mobile', __('手机号'));
        $show->field('mini_program_open_id', __('OpenId'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WechatUser);

        $form->text('nick_name', __('昵称'));
        $form->text('name', __('用户名'));
        $form->password('password', __('密码'));
        $form->mobile('mobile', __('手机号'));
        $form->text('mini_program_open_id', __('OpenId'));

        return $form;
    }

    public function create(Content $content)
    {
        return $content
            ->header('会员管理')
            ->description('会员管理')
            ->body($this->form());
    }
}
