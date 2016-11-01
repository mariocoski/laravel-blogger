<?php
$presenter = new Illuminate\Pagination\Paginator;
$interval = 3;
$numberPages = $paginator->getLastPage();
$currentPage = $paginator->getCurrentPage();

if ($numberPages > 1) {

    ?>
    <ul class="pagination pagination-sm">
        <?php
if ($numberPages <= $interval) {
        for ($i = 1; $i <= $numberPages; $i++) {

            ?>
                <li class="<?php echo $i == $currentPage ? ' active' : ''; ?>">
                    <a href="<?php echo $paginator->getUrl($i); ?>" ><?php echo $i; ?></a>
                </li>
                <?php
}
    } else {
        if ($currentPage < $interval) {
            if ($currentPage > 1) {

                ?>
                    <li class="prev">
                        <a href="{{ $paginator->getUrl($paginator->getCurrentPage()-1) }}">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                    </li>
                    <?php
}
            for ($i = 1; $i <= $interval; $i++) {

                ?>
                    <li class="<?php echo $i == $currentPage ? ' active' : ''; ?>">
                        <a href="<?php echo $paginator->getUrl($i); ?>" ><?php echo $i; ?></a>
                    </li>
                    <?php
}
        } elseif ($currentPage > ($numberPages - ($interval - 1))) {

            ?>
                <li class="prev">
                    <a href="{{ $paginator->getUrl($paginator->getCurrentPage()-1) }}">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </li>
                <?php
for ($i = ($numberPages - ($interval - 1)); $i <= $numberPages; $i++) {

                ?>
                    <li class="<?php echo $i == $currentPage ? ' active' : ''; ?>">
                        <a href="<?php echo $paginator->getUrl($i); ?>" ><?php echo $i; ?></a>
                    </li>
                    <?php
}
        } else {

            ?>
                <li class="prev">
                    <a href="{{ $paginator->getUrl($paginator->getCurrentPage()-1) }}">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </li>
                <?php
for ($i = ($currentPage - 1); $i <= ($currentPage + 1); $i++) {

                ?>
                    <li class="<?php echo $i == $currentPage ? ' active' : ''; ?>">
                        <a href="<?php echo $paginator->getUrl($i); ?>" ><?php echo $i; ?></a>
                    </li>
                    <?php
}
        }
    }
    if ($paginator->getLastPage() > $paginator->getCurrentPage()) {

        ?>
            <li class = "next"><a href = "{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}" class = "{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}">
                    <i class = "fa fa-angle-double-right"></i>
                </a></li>
            <?php
}

    ?>
    </ul>
    <?php
}

?>