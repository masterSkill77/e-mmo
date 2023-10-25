@extends('layouts.main')
@section('section-main')
<div class="col-lg-12">

        <h2 class="mb-4">Metabase Dashboard
                <small  data-toggle="modal" data-target="#defaultModal" ><i style="cursor:pointer" class="fe fe-24 fe-plus"></i></small>
        </h2>
    </div>

        <div class="card shadow">
            <div class="card-body">
              <table class="table table-borderless table-hover">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Type</th>
                    <th>For</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $item)
                    <tr>
                        <td>
                            <small>{{ $item->uuid }}</small>
                        </td>
                        <td class="w-25" >
                            <small>{{ $item->type }}</small>
                          </td>
                        <td class="w-25">
                          <small>{{ $item->question_for }}</small>
                        </td>
                      </tr>

                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-modal="true" style="padding-right: 15px; display: none;">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title ml-3" id="defaultModalLabel">Add a new card</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                          <label for="example-helping">UUID of the question/dashboard</label>
                          <input type="text" id="example-helping" class="form-control" placeholder="UUID" name="uuid">
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-readonly">Type </label>
                            <select class="custom-select" id="custom-select1" name="type">
                                <option value="question">Question</option>
                            <option value="dashboard">Dashboard</option>
                        </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="example-readonly">For </label>
                            <select class="custom-select" id="custom-select" name="question_for">
                                <option value="admin">Administrator</option>
                                <option value="agence">Estate Agency</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn mb-2 btn-primary">Sauvegarder</button>
                    </div>
                </form>
                </div>
            </div>
          </div>
        <div>
</div>
@endsection
