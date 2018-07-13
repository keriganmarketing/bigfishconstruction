<template>
    <div>
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control bg-dark border-0 text-white" placeholder="Name" required >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="email" class="form-control bg-dark border-0 text-white" placeholder="Email" required >
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control bg-dark border-0 text-white" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-outline-primary">Send Message &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    
}
</script>
