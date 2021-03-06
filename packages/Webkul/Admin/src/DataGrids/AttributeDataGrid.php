<?php

namespace Webkul\Admin\DataGrids;

use Webkul\Product\Models\Product;
use Webkul\Ui\DataGrid\DataGrid;
use DB;

/**
 * AttributeDataGrid class
 *
 * @author Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class AttributeDataGrid extends DataGrid
{
    protected $index = 'id'; //the column that needs to be treated as index column

    protected $sortOrder = 'desc'; //asc or desc

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('attributes')
                ->select('id')
                ->addSelect('id', 'code', 'admin_name', 'type', 'is_required', 'is_unique', 'value_per_locale', 'value_per_channel')
                ->whereNotIn('code', (new Product())->getDefaultAttributes())
        ;

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'admin_name',
            'label' => trans('admin::app.datagrid.admin-name'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'type',
            'label' => trans('admin::app.datagrid.type'),
            'type' => 'string',
            'sortable' => true,
            'searchable' => true,
        ]);

        $this->addColumn([
            'index' => 'is_required',
            'label' => trans('admin::app.datagrid.required'),
            'type' => 'boolean',
            'sortable' => true,
            'searchable' => false,
            'wrapper' => function($value) {
                if ($value->is_required == 1)
                    return 'True';
                else
                    return 'False';
            }
        ]);

        $this->addColumn([
            'index' => 'is_unique',
            'label' => trans('admin::app.datagrid.unique'),
            'type' => 'boolean',
            'sortable' => true,
            'searchable' => false,
            'wrapper' => function($value) {
                if ($value->is_unique == 1)
                    return 'True';
                else
                    return 'False';
            }
        ]);

    }

    public function prepareActions()
    {
        $this->addAction([
            'type' => 'Edit',
            'route' => 'admin.catalog.attributes.edit',
            'icon' => 'icon pencil-lg-icon'
        ]);

        $this->addAction([
            'type' => 'Delete',
            'route' => 'admin.catalog.attributes.delete',
            'icon' => 'icon trash-icon'
        ]);
    }

    public function prepareMassActions()
    {
        $this->addMassAction([
            'type' => 'delete',
            'action' => route('admin.catalog.attributes.massdelete'),
            'label' => 'Delete',
            'method' => 'DELETE'
        ]);
    }
}
