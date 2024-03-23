<div class="d-flex justify-content-end">
    <div class="col-auto ms-auto d-print-none">
        <form action="">
            <div class="d-flex">

                <div class="me-3">
                    <input type="search" wire:model="search"
                        @keydown.enter.prevent="$wire.sortBy($wire.sort, $wire.direction, $wire.value)"
                        class="form-control" placeholder="Rechercher"
                    >
                </div>

                <div class="me-3">
                    <select wire:model="sort" @change="$wire.sortBy($wire.value)" class="form-select">
                        <option value="">Trier</option>
                        <option value="date">Date</option>
                        <option value="author">Auteur</option>
                        <option value="category">Catégorie</option>
                    </select>
                </div>

                <div class="me-3">
                    <select wire:model="direction" @change="$wire.sortBy($wire.sort)" class="form-select">
                        <option value="asc">Ascendant</option>
                        <option value="desc">Descendant</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
