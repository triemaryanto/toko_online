<div>
    <div id="modal_title_basic" class="modal fade @if($isShow) show @endif" @if($isShow) style="display: block;" @else style="display: none;" aria-hidden="true" @endif tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <span class="font-weight-semibold modal-title">Hapus Data</span>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <p><i class="icon-warning22 mr-3 icon-2x text-danger"></i> Apakah Anda yakin akan menghapus data ini?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-warning" data-dismiss="modal" wire:click='showModal'>Tidak</button>
                    <button type="button" class="btn bg-primary" wire:click="confirm">Ya</button>
                </div>
            </div>
        </div>
    </div>
</div>