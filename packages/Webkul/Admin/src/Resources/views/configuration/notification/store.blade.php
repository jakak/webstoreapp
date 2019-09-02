<div class="content" id="recep-main">
    <div class="page-header">
        <div class="page-title">
            <h1>
                Store Notifications
            </h1>
        </div>

        <div class="page-action">
            <button id="recep-create-btn" onclick="goToRecepPage()" class="btn btn-md btn-primary">
                Add Recipient
            </button>
        </div>
    </div>

    <div class="page-content">
        @inject('notificationGrid', 'App\DataGrids\StoreNotificationDataGrid')
        {!! $notificationGrid->render() !!}
    </div>
</div>
@push('styles')
    <style>
        td:nth-child(4) {
            text-transform: capitalize;
        }
    </style>
@endpush

@push('scripts')
<script>
    document.querySelector('#recep-create').classList.add('d-none');
    // document.querySelector('#recep-edit').classList.add('d-none');

    let goToRecepPage = function () {
        document.querySelector('#recep-main').classList.add('d-none')
        document.querySelector('#recep-create').classList.remove('d-none');
    }

    let checker = setInterval(() => {
        if (document.querySelector('.table tr td:nth-child(3)')) {
            clearInterval(checker);
            pageSetup();
        }
    }, 10);

    const displayButton = () => {
        let nodes = document.querySelectorAll('.table tr td:nth-child(3)')

        nodes.forEach(elem => {
            elem.innerHTML = `
            <button id="recep-create-btn" onclick="testMail('${elem.previousElementSibling.innerHTML}')" class="btn btn-md btn-primary">
                Test Now
            </button>`;
        });
    }

    const addEditHandler = () => {
        document.querySelectorAll('.pencil-lg-icon').forEach(btn => {
            btn.addEventListener('click', evt => {
                evt.preventDefault();
                // Show edit page
                setupEditPage(btn.parentElement);
            });
        });
    }

    const testMail = email => {
        location.assign(`/storemanager/configuration/notifications/store/recipient/${email}/testMail`);
    }

    const setupEditPage = url => {
        fetch(`/storemanager/configuration/notifications/store/recipient/${url.search.substring(1)}/`)
            .then(response => {
                return response.json();
            })
            .then(response => {
                goToRecepPage();
                const inp = document.createElement('input');
                inp.type="hidden";
                inp.value = response.id;
                inp.name = "id";

                document.querySelector('#recep-create form').appendChild(inp);

                document.querySelector('[ name="user"]').value = response.user
                document.querySelector('[name="status"]').value = response.status

            })
        ;
        console.log(url.search.substring(1));
    }

    function pageSetup () {
        displayButton();

        addEditHandler();
    }

</script>
@endpush
