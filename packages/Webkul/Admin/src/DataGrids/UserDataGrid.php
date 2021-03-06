<?php

namespace Webkul\Admin\DataGrids;

use Webkul\Ui\DataGrid\DataGrid;
use DB;

/**
 * UserDataGrid Class
 *
 * @author Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class UserDataGrid extends DataGrid
{
    protected $index = 'user_id';

    protected $sortOrder = 'desc'; //asc or desc

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('admins as u')
            ->addSelect(
                'u.id as user_id', 'u.first_name as user_first_name', 'u.last_name as user_last_name', 'u.status', 'u.email', 'ro.name as role_name')
            ->leftJoin('roles as ro', 'u.role_id', '=', 'ro.id');

        $this->addFilter('user_id', 'u.id');
        $this->addFilter('user_first_name', 'u.first_name');
        $this->addFilter('user_last_name', 'u.last_name');
        $this->addFilter('role_name', 'ro.name');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'user_first_name',
            'label' => trans('admin::app.datagrid.first-name'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'user_last_name',
            'label' => trans('admin::app.datagrid.last-name'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'status',
            'label' => trans('admin::app.datagrid.status'),
            'type' => 'boolean',
            'searchable' => true,
            'sortable' => true,
            'wrapper' => function($value) {
                if ($value->status == 1) {
                    return 'Active';
                } else {
                    return 'Inactive';
                }
            }
        ]);

        $this->addColumn([
            'index' => 'email',
            'label' => trans('admin::app.datagrid.email'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'role_name',
            'label' => trans('admin::app.datagrid.role'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);
    }

    public function prepareActions() {
        $this->addAction([
            'type' => 'Edit',
            'route' => 'admin.users.edit',
            'icon' => 'icon pencil-lg-icon'
        ]);

        $this->addAction([
            'type' => 'Delete',
            'route' => 'admin.users.delete',
            'icon' => 'icon trash-icon'
        ]);
    }
}
