<div class="content" id="recep-create">
    <form action="{{ route('admin.notification.add-recipient') }}" method="POST">
        @csrf
        <div class="page-header">
            <div class="page-title">
                <i class="icon angle-left-icon back-link" onclick="window.history.go(-0);"></i>
                <h1>
                   Add Recipient
                </h1>
            </div>


        </div>

        <div class="page-content">

                <div slot="body">
                    <div class="control-group">
                        <label for="user" class="required">Select Staff Account</label>
                        <select type="text" v-validate="'required'" class="control" id="user" name="user">
                            @foreach (\Webkul\User\Models\Admin::all() as $admin)
                                @if(!App\StoreNotification::where('email', $admin->email)->first())
                                <option value="{{ $admin->id }}">{{ $admin->first_name }}</option>
                                @endif
                            @endforeach
                        </select>
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
