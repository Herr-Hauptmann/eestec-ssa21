<div class="form-row">
    <table id="{{ 'edicijeTabela' . $col1 . $col2 }}" class="table mt-5">
        <thead>
            <tr>
                <td>{{ $col1 }}</td>
                <td>{{ $col2 }}</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @php
                if (isset($edit) && isset($edition))
                {
                    $collectionToUse = $edition->{$edit['relation1']};
                    $arrayToUse = $collectionToUse->pluck('id')->toArray();
                }
                else
                {
                    $arrayToUse = old($input_name1);
                }
            @endphp
            @if (\is_array($arrayToUse) && count($arrayToUse) > 0)
                @foreach ($arrayToUse as $index => $id)
                    <tr>
                        <td>
                            <select class="form-control @error($input_name1 . '.' . $index) is-invalid @enderror" name="{{ $input_name1 . '[]' }}">
                                <option value="0" @error($input_name1 . '.' . $index) selected @enderror>Izaberi...</option>
                                @foreach ($array1 as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $id) selected @endif >{{ $select_option_1_text($item) }}</option>
                                @endforeach
                            </select>
                            @error($input_name1 . '.' . $index)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                        <td>
                            <select class="form-control @error($input_name2 . '.' . $index) is-invalid @enderror" name="{{ $input_name2 . '[]' }}">
                                <option value="0" @error($input_name2 . '.' . $index) selected @enderror>Izaberi...</option>
                                @foreach ($array2 as $item)
                                    <option value="{{ $item->id }}" 
                                        @if ((\is_array(old($input_name2)) && $item->id == old($input_name2)[$index]) ||
                                             (isset($collectionToUse) && !\is_array(old($input_name2)) && $item->id == $collectionToUse[$index]->{isset($edit['related_id']) ? $edit['related_id'] : $input_name2})) 
                                            selected 
                                        @endif >
                                        {{ $select_option_2_text($item) }}
                                    </option>
                                @endforeach
                            </select>
                            @error($input_name2 . '.' . $index)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                        <td>
                            <input type="button" class="btn btn-primary btn-sm" data-addrow id="{{ 'edicijeAddRow' . $col1 }}" value="Add Row" />
                            <input type="button" class="btn btn-danger btn-sm" data-removerow id="{{ 'edicijeRemoveRow' . $col1 }}" value="Remove Row" />
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>
                        <select class="form-control" name="{{ $input_name1 . '[]' }}">
                            <option selected>Izaberi...</option>
                            @foreach ($array1 as $item)
                                <option value="{{ $item->id }}">{{ $select_option_1_text($item) }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="{{ $input_name2 . '[]' }}">
                            <option value="0" selected>Izaberi...</option>
                            @foreach ($array2 as $item)
                                <option value="{{ $item->id }}">{{ $select_option_2_text($item) }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="button" class="btn btn-primary btn-sm" data-addrow id="{{ 'edicijeAddRow' . $col1 }}" value="Add Row" />
                        <input type="button" class="btn btn-danger btn-sm" data-removerow id="{{ 'edicijeRemoveRow' . $col1 }}" value="Remove Row" />
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>