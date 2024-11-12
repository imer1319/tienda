<form action="#" method="get" id="form">
    <div class="form-group row">
        <div class="col-md-3">
            <input type="text" class="form-control" name="name" value="{{ request('name') }}" placeholder="Nombre del producto">
        </div>
        <div class="col-md-3">
            <select name="category_id" id="category_id" class="form-control">
                <option value="" disabled selected>-- Seleccione una categoria --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ request('category_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            @can('products_create')
                <span class="tts:right tts-slideIn tts-custom" aria-label="Crear nuevo">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary rounded-pill float-end">
                        <i class="fas fa-plus"></i>
                    </a>
                </span>
            @endcan
            <span class="tts:right tts-slideIn tts-custom" aria-label="Exportar a excel">
                <a href="{{ route('admin.ventas.download.excel', request()->all()) }}"
                    class="btn btn-primary rounded-pill float-end">
                    <i class="fas fa-file-excel"></i>
                </a>
            </span>
            <span class="tts:right tts-slideIn tts-custom" aria-label="Imprimir">
                <a href="{{ route('admin.ventas.download.print', request()->all()) }}" target="_blank"
                    class="btn btn-primary rounded-pill float-end">
                    <i class="fas fa-print"></i>
                </a>
            </span>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-primary font-verdana btn-sm" type="button" onclick="search();">
                <i class="fa fa-search" aria-hidden="true"></i>&nbsp;Buscar
            </button>
            <button class="btn btn-primary font-verdana btn-sm" type="button" onclick="limpiar();">
                &nbsp;<i class="fa fa-eraser"></i>&nbsp;Limpiar
            </button>
            <i class="fa fa-spinner custom-spinner fa-spin fa-2x fa-fw spinner-btn" style="display: none;"></i>
        </div>
    </div>
</form>
