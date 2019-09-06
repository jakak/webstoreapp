<?php


namespace App\DataGrids;


use Illuminate\Support\Facades\DB;
use Webkul\Ui\DataGrid\DataGrid;

class ManagePagesDataGrid extends DataGrid
{

  protected $sortOrder = 'desc';
  protected $index = 'name';

  public function prepareQueryBuilder()
  {
    $queryBuilder = DB::table('pages as page')
      ->addSelect('page.name', 'page.url', 'page.status');

    $this->setQueryBuilder($queryBuilder);
  }

  public function addColumns()
  {
    $this->addColumn([
      'index' => 'name',
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
      'route' => 'admin.configuration.pages.delete',
      'icon' => 'icon trash-icon'
    ]);
  }
}
