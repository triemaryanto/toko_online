<div>
    <div class="list-icons">
        <div class="dropdown">
            <a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
                <i class="nav-icon fas fa-bars"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(22px, 1px, 0px);">
                <button href="#" class="dropdown-item" wire:click="$emitUp('edit', {{ $row->id}})"><i class="icon-pencil"></i> Edit</a>
                    <button href="#" class="dropdown-item" wire:click="$emit('showModal', {{ $row->id}})"><i class="icon-trash"></i> Delete</a>
            </div>
        </div>
    </div>
</div>