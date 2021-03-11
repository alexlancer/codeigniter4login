<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Publication</h3>
                <hr>
                <form class="" action="/publication" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="hashtag">Hashtag</label>
                                <input type="text" class="form-control" name="hashtag" id="hashtag" value="<?= set_value('hashtag') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="author">Auteur</label>
                                <input type="text" class="form-control" name="auteur" id="auteur" value="<?= set_value('auteur') ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description" value="<?= set_value('description') ?>">
                            </div>
                        </div>



                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Publier</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
