<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


<script>
    function alert(type, msg) {
        // Determine the Bootstrap class based on the alert type (success or error)
        let bs_class = (type === 'success') ? 'alert-success' : 'alert-danger';

        // Create the alert element
        let element = document.createElement('div');
        element.innerHTML = `
                            <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
                                <strong class="ms-4">${msg}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

        // Append the element to the body
        document.body.append(element);
    }

    // each tag stuck for the moment the link is click and not moved to another link
    let navbar = document.getElementById('dashboard-menu');
    let a_tabs = navbar.getElementsByTagName('a');


    function setActive() {


        for (let i = 0; i < a_tabs.length; i++) {
            let file = a_tabs[i].href.split('/').pop();
            let file_name = file.split('.')[0];
            if (document.location.href.indexOf(file_name) >= 0) {
                a_tabs[i].classList.add('active');
            }
        }

    }

    // Call the function
    setActive();
    
</script>