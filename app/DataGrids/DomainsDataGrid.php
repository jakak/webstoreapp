<?php


namespace App\DataGrids;


use DB;
use Webkul\Ui\DataGrid\DataGrid;

class DomainsDataGrid extends DataGrid
{

    protected $sortOrder = 'desc';
    protected $index = 'id';

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('domains as domain')
            ->addSelect('domain.status', 'domain.custom_domain', 'domain.webstore_domain');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'webstore_domain',
            'label' => 'Webstore Domain',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'custom_domain',
            'label' => 'Custom Domain',
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
}
