<div class="col-md-6">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><strong>Pre Checklist</strong></th>
                <th><strong>Attachment</strong></th>
                <th><strong>Action</strong></th>
            </tr>
        </thead>
        <form id="midbtn-form" action="{{ url('/precheck/' . $mainTask->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <tbody>
                @foreach ($precheck as $key => $value)
                    <tr>
                        <td style="display: none;">
                            <input type="text" class="form-control" name="task_id" value="{{ $mainTask->id }}"
                                id="field-file" placeholder="">
                        </td>
                        <td style="display: none;">
                            <input type="text" class="form-control" name="precheck_id[]" value="{{ $value->id }}"
                                id="field-file" placeholder="">
                        </td>
                        <td>{{ $value->note }}</td>
                        <td>

                            <input type="file" class="form-control" name="precheck_attach[]" accept=".pdf"
                                id="field-file" placeholder="" required>

                        </td>
                        <td>
                            <ul class="icheck-list">
                                <li>
                                    <input tabindex="5" value="yes" name="status[]" type="checkbox" class=""
                                        id="minimal-checkbox-1" required>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td></td>
                <td></td>
                <td>
                    <button id="progress-btn" type="submit" style="float:right;" class="btn btn-success">
                        Confirm
                    </button>
                </td>
        </form>
    </table>
</div>
