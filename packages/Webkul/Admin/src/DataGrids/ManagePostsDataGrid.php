<?php


namespace Webkul\Admin\DataGrids;


use Illuminate\Support\Facades\DB;
use Webkul\Ui\DataGrid\DataGrid;

class ManagePostsDataGrid extends DataGrid
{

    protected $sortOrder = 'desc';
    protected $index = 'title';

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('blogs as post')
            ->addSelect('post.title', 'post.url', 'post.status');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'title',
            'label' => 'Page Name',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'url',
            'label' => 'Page URL',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'url', // Setting index to url inorder to render the button correctly
            'label' => 'View Pages',
            'type' => 'button',
            'sortable' => false,
            'searchable' => false,
        ]);

        $this->addColumn([
            'index' => 'status',
            'label' => 'Status',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);
    }

    public function prepareActions() {
        $this->addAction([
            'type' => 'Edit',
            'route' => 'admin.configuration.pages.edit',
            'icon' => 'icon pencil-lg-icon'
        ]);

        $this->addAction([
            'type' => 'Delete',
            'route' => 'admin.configuration.post.delete',
            'icon' => 'icon trash-icon'
        ]);
    }
}
