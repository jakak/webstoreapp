<div class="content" id="recep-edit">
    <form action="{{ route('admin.notification.add-recipient') }}" method="POST">
        @csrf
        <div class="page-header">
            <div class="page-title">
                <i class="icon angle-left-icon back-link" onclick="window.history.go(-0);"></i>
                <h1>
                    Modify Recipient
                </h1>
            </div>


        </div>

        <div class="page-content">

            <div slot="body">
                <div class="control-group">
                    <label for="user" class="required">Select Staff Account</label>
                    <input type="hidden" v-validate="'required'" class="control" name="user" id="UserId">
                    <input readonly type="text" class="control" name="userEmail" id="UserName">
                </div>

                <div class="control-group">
                    <label for="status" class="required">Status</label>
                    <select type="text" v-validate="'required'" class="control" id="status" name="status">
                        <option value="enabled" selected>Enable</option>
                        <option value="disabled">Disable</option>
                    </select>
                </div>
            </div>

        </div>
        <hr class="horizontal-line">
        <div class="form-bottom">
            <button id="addLocation" class="btn btn-md btn-primary">
                Save
            </button>
        </div>
    </form>
</div>
