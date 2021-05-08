<x-layout>
    <!-- Queue Section-->
    <section class="page-section" id="queue">
        <div class="container">
            <!-- Queue Section Heading-->
            <h2 class="page-section-heading text-secondary text-center text-uppercase pt-5">Bukit Katil</h2>
            <!-- Icon Divider-->
            <x-divider/>
            <!-- Queue Subheading-->
            <div class="row text-uppercase">
                <!-- Queue Table 1 -->
                <x-queue-table status="Queuing" table="table-danger"/>
                <!-- Queue Table 2 -->
                <x-queue-table status="Grooming" table="table-warning"/>
                <!-- Queue Table 3 -->
                <x-queue-table status="Completed" table="table-success"/>
            </div>
        </div>
    </section>
</x-layout>