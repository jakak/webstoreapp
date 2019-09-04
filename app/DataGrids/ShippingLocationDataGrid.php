<?php

namespace App\DataGrids;

use Webkul\Ui\DataGrid\DataGrid;
use Illuminate\Support\Facades\DB;

class ShippingLocationDataGrid extends DataGrid
{
    protected $sortOrder = 'desc';
    protected $index = 'location';

    public function prepareQueryBuilder()
    {
         $queryBuilder = DB::table('locations as location')
                ->addSelect('location.location', 'location.state', 'location.country', 'location.rate', 'location.type', 'location.description', 'location.status');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'location',
            'label' => 'Location',
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'state',
            'label' => 'State',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'country',
            'label' => 'Country',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'rate',
            'label' => 'Rate (N)',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'type',
            'label' => 'Type',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'status',
            'label' => 'Status',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
        ]);

    }

    public function prepareActions() {
        $this->addAction([
            'type' => 'Edit',
            'route' => 'admin.configuration.location.edit',
            'icon' => 'icon pencil-lg-icon'
        ]);

        $this->addAction([
            'type' => 'Delete',
            'route' => 'admin.configuration.location.delete',
            'icon' => 'icon trash-icon'
        ]);
    }
}
