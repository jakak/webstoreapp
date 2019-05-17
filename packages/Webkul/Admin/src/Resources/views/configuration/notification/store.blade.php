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
<script>
    setTimeout(() => {
        
    let nodes = document.querySelectorAll('.table tr td:nth-child(3)')
    
    nodes.forEach(elem => {
        elem.innerHTML = `<button id="recep-create-btn" class="btn btn-lg btn-primary">
                            Test Now
                        </button>`;
    })
    }, 1000);
    
</script>