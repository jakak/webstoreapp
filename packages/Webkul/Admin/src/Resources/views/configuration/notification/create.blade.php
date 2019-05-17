<div class="content" id="recep-create">
    <form action="{{ route('admin.notification.add-recipient') }}" method="POST">
        @csrf
        <div class="page-header">
            <div class="page-title">
                <h1>
                    Store Notifications
                </h1>
            </div>

            <div class="page-action">
                <button id="addLocation" class="btn btn-lg btn-primary">
                    Save
                </button>
            </div>
        </div>

        <div class="page-content">
            <accordian :title="'Add an order notification'" :active="true">
                <div slot="body">
                    <div class="control-group">
                        <label for="user" class="required">Select Staff Account</label>
                        <select type="text" v-validate="'required'" class="control" id="user" name="user">
                            @foreach (\Webkul\User\Models\Admin::all() as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
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
            </accordian>
        </div>
    </form>
</div>