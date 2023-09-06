@extends('layouts.main')
@section('section-main')
<div class="col-lg-12">

        <h2>Metabase dashboard
                <small  data-toggle="modal" data-target="#defaultModal" ><i style="cursor:pointer" class="fe fe-24 fe-plus"></i></small>
        </h2>
    </div>

        <div class="card shadow">
            <div class="card-body">
              <div class="toolbar">
                <form class="form">
                  <div class="form-row">
                    <div class="form-group col-auto">
                      <label for="search" class="sr-only">Search</label>
                      <input type="text" class="form-control" id="search1" value="" placeholder="Search">
                    </div>
                  </div>
                </form>
              </div>
              <table class="table table-borderless table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Pour</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $item)
                    <tr>

                        <td>
                            <small>{{ $item->uuid }}</small>
                        </td>
                        <td>
                            <small>{{ $item->type }}</small>
                          </td>
                        <td>
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
                  <h5 class="modal-title" id="defaultModalLabel">Ajouter un nouveau card</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                          <label for="example-helping">UUID de l'application</label>
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
                            <label for="example-readonly">Pour </label>
                            <select class="custom-select" id="custom-select" name="question_for">
                                <option value="admin">Admin</option>
                                <option value="agence">Agence</option>
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
