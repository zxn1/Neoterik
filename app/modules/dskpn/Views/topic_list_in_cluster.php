<h3 class="ps-3">Senarai Topik Dalam Kluster</h3>
<div class="container-fluid py-2">
    <div class="row">
        <div class="card">
            <div class="card-body p-3">
                    <div class="accordion" id="accordionExample" >
                        <div class="accordion-item" style="background-color: #f4ecf6; border: none; margin-bottom: 5px;">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="bi bi-caret-down-fill"></i> Cluster 1
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!-- Data for Cluster 1 goes here -->
                                    <ul class="list-group">
                                        <li class="list-group-item">Topic 1</li>
                                        <li class="list-group-item">Topic 2</li>
                                        <li class="list-group-item">Topic 3</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" style="background-color: #f4ecf6; border: none; margin-bottom: 5px;">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Cluster 2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" >
                                <div class="accordion-body">
                                    <!-- Data for Cluster 2 goes here -->
                                    <ul class="list-group">
                                        <li class="list-group-item">Topic A</li>
                                        <li class="list-group-item">Topic B</li>
                                        <li class="list-group-item">Topic C</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" style="background-color: #f4ecf6; border: none; margin-bottom: 5px;">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Cluster 3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" >
                                <div class="accordion-body">
                                    <!-- Data for Cluster 2 goes here -->
                                    <ul class="list-group">
                                        <li class="list-group-item">Topic A</li>
                                        <li class="list-group-item">Topic B</li>
                                        <li class="list-group-item">Topic C</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<br>
<h3 class="ps-3">Daftar Topik dalam Kluster</h3>
<div class="container-fluid py-2">
    <div class="row">
        <div class="card">
            <div class="card-body p-3" >
                <div class="row align-items-center" style="background-color: #f4ecf6; border: none; margin-bottom: 5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Select your cluster dropdown -->
                            <div class="form-group">
                                <label for="clusterSelect" >Select your cluster</label>
                                <select class="form-control" id="clusterSelect">
                                    <!-- Dummy data -->
                                    <option >Cluster 1</option>
                                    <option>Cluster 2</option>
                                    <option>Cluster 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- Subtema text input -->
                            <div class="form-group">
                                <label for="subtemaInput">Subtema</label>
                                <input type="text" class="form-control" id="subtemaInput">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- Year text input -->
                            <div class="form-group">
                                <label for="yearInput">Year</label>
                                <input type="text" class="form-control" id="yearInput">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Subtema text input -->
                            <div class="form-group">
                                <label for="subtemaInput">Tema</label>
                                <input type="text" class="form-control" id="subtemaInput">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Year text input -->
                            <div class="form-group">
                                <label for="yearInput">Topik</label>
                                <input type="text" class="form-control" id="yearInput">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Button for Topic -->
                        <div class="form-group">
                        <button type="button" class="btn btn-primary form-control" id="topicButton" style="background-color: #bdc3f9; border-color: #bdc3f9;">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

