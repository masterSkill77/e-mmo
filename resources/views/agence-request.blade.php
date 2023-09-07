@extends('layouts.main')
@section('section-main')
<div class="col-lg-12">
        <h2>Demande de création d'agence
        </h2>
    </div>

        <div class="card shadow">
            <div class="card-body">
              <table class="table table-borderless table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Responsable</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($agences as $item)
                    <tr>
                        <td>
                            <small>{{ $item->id }}</small>
                        </td>
                        <td>
                            <small>{{ $item->agence_name }}</small>
                        </td>
                        <td>
                            <small>{{ $item->agence_status }}</small>
                        </td>
                        <td>
                            <small>{{ $item->agence_mail }}</small>
                          </td>
                        <td>
                          <small>{{ $item->responsable->name }}</small>
                        </td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/agence-request/{{$item->id}}">Activer</a>
                            </div>
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
