<div class="content" id="recep-main">
    <div class="page-header">
        <div class="page-title">
            <h1>
                Store Notifications
            </h1>
        </div>

        <div class="page-action">
            <button id="recep-create-btn" onclick="goToRecepPage()" class="btn btn-lg btn-primary">
                Add Recipient
            </button>
        </div>
    </div>

    <div class="page-content capitalize-tr">
        @inject('locationGrid', 'App\DataGrids\StoreNotificationDataGrid')
        {!! $locationGrid->render() !!}
    </div>
</div>