<!-- Static Backdrop Modal -->

<div class="modal fade" id="staticBackdropl{{ $company->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Company Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Customer name:</p>
                <h5 class="font-size-15">{{ $company->name }}</h5>

                <p class="mb-2">Owner:</p>
                <h5 class="font-size-15">{{ $company->user->name }}</h5>

                <p class="mb-2">Phone:</p>
                <h5 class="font-size-15">{{ $company->phone }}</h5>

                <p class="mb-2">Address:</p>
                <h5 class="font-size-15">{{ $company->address }} pt</h5>

                <p class="mb-2">Owner:</p>
                <h5 class="font-size-15">{{ $company->user->name }}</h5>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>