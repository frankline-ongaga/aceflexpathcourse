<div class="container-lg" id="main-container">
    <section class="pt-5">
        <h2 class="text-center mt-3 mb-5">FlexPath Courses</h2>

        <?php if (empty($flexpath_categories) || !is_array($flexpath_categories)) : ?>
            <p class="text-center text-muted mb-0">No courses found.</p>
        <?php else : ?>
            <div class="pt-30">
                <nav>
                    <div class="nav nav-tabs border-0" id="flexpath-nav-tab" role="tablist">
                        <?php foreach ($flexpath_categories as $idx => $category) :
                            $isActive = ($idx === 0);
                            $slug = isset($category['slug']) ? (string) $category['slug'] : ('category-' . $idx);
                            $safeId = preg_replace('/[^a-z0-9\\-]+/i', '-', strtolower($slug));
                            $safeId = trim($safeId, '-');
                            if ($safeId === '') {
                                $safeId = 'category-' . $idx;
                            }
                        ?>
                            <button
                                class="nav-link <?= $isActive ? 'active' : ''; ?>"
                                id="nav-<?= $safeId; ?>-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#nav-<?= $safeId; ?>"
                                type="button"
                                role="tab"
                                aria-controls="nav-<?= $safeId; ?>"
                                aria-selected="<?= $isActive ? 'true' : 'false'; ?>"
                            ><?= htmlspecialchars($category['name'] ?? 'Category', ENT_QUOTES, 'UTF-8'); ?></button>
                        <?php endforeach; ?>
                    </div>
                </nav>

                <div class="tab-content border px-4 bg-light" id="flexpath-nav-tabContent" style="border-radius: 18px;">
                    <?php foreach ($flexpath_categories as $idx => $category) :
                        $isActive = ($idx === 0);
                        $slug = isset($category['slug']) ? (string) $category['slug'] : ('category-' . $idx);
                        $safeId = preg_replace('/[^a-z0-9\\-]+/i', '-', strtolower($slug));
                        $safeId = trim($safeId, '-');
                        if ($safeId === '') {
                            $safeId = 'category-' . $idx;
                        }
                        $children = $category['children'] ?? [];
                    ?>
                        <div class="tab-pane fade <?= $isActive ? 'show active' : ''; ?>" id="nav-<?= $safeId; ?>" role="tabpanel" aria-labelledby="nav-<?= $safeId; ?>-tab">
                            <div class="row align-items-center py-4">
                                <?php if (empty($children)) : ?>
                                    <div class="col-12">
                                        <p class="mb-0 text-muted">No sub-categories found.</p>
                                    </div>
                                <?php else : ?>
                                    <?php foreach ($children as $child) :
                                        $childName = htmlspecialchars($child['name'] ?? 'Subcategory', ENT_QUOTES, 'UTF-8');
                                        $childDesc = trim((string) ($child['description'] ?? ''));
                                        $childDesc = $childDesc !== '' ? htmlspecialchars($childDesc, ENT_QUOTES, 'UTF-8') : '';
                                        $childSlug = $child['slug'] ?? '';
                                        $samplesUrl = base_url('flexpath-samples/' . $childSlug);
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                            <div class="card mb-3 custom-hover shadow-none" style="border: 1px solid #ccc !important;">
                                                <div class="card-body">
                                                    <h5 class="h6 mb-1"><?= $childName; ?></h5>
                                                    <?php if ($childDesc !== '') : ?>
                                                        <p class="card-text small mb-2"><?= $childDesc; ?></p>
                                                    <?php endif; ?>
                                                    <a class="btn btn-sm btn-outline-primary" href="<?= htmlspecialchars($samplesUrl, ENT_QUOTES, 'UTF-8'); ?>">View Samples</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
</div>

