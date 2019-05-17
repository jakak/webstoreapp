<?php

namespace App\DataGrids;

use Webkul\Ui\DataGrid\DataGrid;
use App\StoreNotification;
use DB;

class StoreNotificationDataGrid extends DataGrid
{
    protected $sortOrder = 'desc';
    protected $index = 'email';

    public function prepareQueryBuilder()
    {
         $queryBuilder = DB::table('store_notifications as notif')
                ->addSelect('notif.name', 'notif.email', 'notif.test_btn', 'notif.status');
        
        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'name',
            'label' => 'Recipient Name',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'email',
            'label' => 'Recipient Email',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
        ]);

        $this->addColumn([
            'index' => 'test_btn',
            'label' => 'Send Test Notification',
            'type' => 'html',
            'searchable' => false,
            'sortable' => false,
        ]);

        $this->addColumn([
            'index' => 'status',
            'label' => 'Status',
            'type'  => 'string',
            'searchable' => true,
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
            'route' => 'admin.notification.del-recipient',
            'icon' => 'icon trash-icon'
        ]);
    }
}
