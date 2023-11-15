<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <card class="strpied-tabled-with-hover" body-classes="table-full-width table-responsive">
            <template slot="header">
              <h4 class="card-title">Tasks</h4>
              <p class="card-category"></p>
            </template>
            <l-table class="table-hover table-striped" :columns="table1.columns" :data="table1.data">
            </l-table>
          </card>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import LTable from 'src/components/Table.vue'
import Card from 'src/components/Cards/Card.vue'
const tableColumns = ['Id', 'Name', 'Description', 'Assigned User', 'Start Date', 'End Date', 'Status']
const tableData = [{
  id: 1,
  name: 'VAT',
  Description: 'Juy and augost VAT',
  AssignedUser: 'John',
  StartDate: '12/10/2023',
  EndDate: '15/10/2023',
  Status: 'Active'
},
{
  id: 2,
  name: 'Compilation',
  Description: 'Juy and augost VAT',
  AssignedUser: 'Mike',
  StartDate: '12/10/2023',
  EndDate: '15/10/2023',
  Status: 'Active'
},
{
  id: 3,
  name: 'Accounting',
  Description: 'Juy and augost VAT',
  AssignedUser: 'Niger',
  StartDate: '12/10/2023',
  EndDate: '15/10/2023',
  Status: 'Active'
}
]
export default {
  components: {
    LTable,
    Card
  },
  data() {
    return {
      table1: {
        columns: [...tableColumns],
        data: [...tableData]
      },
      table2: {
        columns: [...tableColumns],
        data: [...tableData]
      }
    }
  }
}
</script>
<style></style>
