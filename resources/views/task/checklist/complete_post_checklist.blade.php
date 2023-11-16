<div class="col-md-6">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><strong>Post Checklist</strong></th>
                <th><strong>Attachment</strong></th>
                <th><strong>Action</strong></th>
            </tr>
        </thead>
        <form id="progress-btn" action="{{ url('/postcheck') }}" method="POST" enctype="multipart/form-data">
            <tbody>
                @foreach ($postcheck as $key => $value)
                    <tr>
                        <td style="display: none;">
                            <input type="text" class="form-control" name="task_id" value="{{ $mainTask->id }}"
                                id="field-file" placeholder="">
                        </td>
                        <td>{{ $value->note }}</td>
                        <td>
                            <input type="file" class="form-control" name="postcheck_attach" accept=".pdf"
                                id="field-file" disabled>
                        </td>
                        <td>
                            <ul class="icheck-list">
                                <li>
                                    <input tabindex="5" value="yes" name="status" type="checkbox" class=""
                                        id="minimal-checkbox-1" disabled checked>
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
                    <button disabled type="submit" style="float:right;" class="btn btn-success">
                        Confirm
                    </button>
                </td>
            </tfoot>
        </form>
    </table>
</div>
