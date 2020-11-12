<template>
  <!--<div
    class="modal inmodal"
    id="modalForm"
    name="modalForm"
    role="dialog"
    aria-labelledby="modalFormLabel"
    aria-hidden="true"
    tabindex="-1"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content animated flipInY" style="margin-top: 30%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span><span class="sr-only">Close</span>
          </button>
          <h1>
            <strong>{{ moduleTitle }}</strong>
          </h1>
          <div class="ibox-tools" style="margin-top: -3%"></div>
        </div>
        <div class="modal-body">
          <form class="ajax-form" method="post" action="" autocomplete="off">
            <div class="">
              <label for="name">Nombre</label>
              <div class="controls">
                <div class="input-prepend input-group">
                  <input
                    class="form-control"
                    style="width: 200px; height: 30px"
                    id="name"
                    name="name"
                    v-model="info.name"
                    type="text"
                  />
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button
            type="button"
            class="btn-rounded btn-sm btn-success"
            data-dismiss="modal"
            aria-label="Close"
          >
            <i class="fa fa-arrow-left"></i> Cerrar
          </button>
          <button
            class="btn-rounded btn-sm btn-success"
            @click="resetFields"
            type="reset"
          >
            <i class="fa fa-refresh"></i> Reset
          </button>
          <button
            @click.prevent="sendForm"
            class="btn-rounded btn-sm btn-success"
            type="submit"
          >
            <i class="fa fa-check"></i> Guardar
          </button>
        </div>
      </div>
    </div>
  </div>-->
  <div
    class="modal fade"
    id="modalForm"
    tabindex="-1"
    aria-labelledby="modalFormlLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFormLabel">Usuario</h5>

          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <h4><strong>Nombre</strong></h4>
            {{ info.name }}
          </div>
          <div class="col-md-12">
            <h4><strong>Email</strong></h4>
            {{ info.email }}
          </div>
          <div class="col-md-12">
            <h4><strong>Roles</strong></h4>
          </div>
          <div v-for="(role, irole) in info.roles" :key="irole">
            <div class="col-md-2">{{ role.name }}</div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-success">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
export default {
  data() {
    return {
      moduleTitle: "Usuario",
      disabledField: 0,
      parents: [],
      info: {
        id: 0,
        name: "",
      },
    };
  },
  methods: {
    actionURL() {
      return this.info.id > 0
        ? "/" + this.moduleUri + "/" + this.info.id
        : "/" + this.moduleUri;
    },
    comeBackList() {
      window.location.href = "/" + this.moduleUri;
    },
    sendForm(e) {
      e.preventDefault();
      let app = this;
      if (this.info.id > 0) {
        // estamos en un update
        axios
          .put(this.actionURL(), this.info)
          .then((response) => {
            this.$messageTransaction(response);
          })
          .catch((error) => {
            this.$httpMessage(error);
          });
      } else {
        // es un create
        axios
          .post(this.actionURL(), this.info)
          .then((response) => {
            console.log(this.actionURL());
            this.$messageTransaction(response);
          })
          .catch((error) => {
            this.$httpMessage(error);
          });
      }
    },
    resetFields() {
      Object.assign(this.$data, this.$options.data.call(this));
      //this.loadData();
    },
    loadData(idedit = 0) {
      this.info.id = idedit;

      if (this.info.id > 0) {
        axios
          .get("/api/users/3")
          .then((response) => {
            this.info = response.data;
          })
          .catch((error) => {
            console.log("dio error");
            console.log(error.response);
          });
      } else {
        this.resetFields();
      }
    },
  },
  created() {},
  mounted() {},
};
</script>
