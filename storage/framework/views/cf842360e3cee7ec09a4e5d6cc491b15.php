<?php $__env->startSection('content'); ?>
<div class="login-bg">
    <div class="row d-flex justify-content-center w-100 m-0">
        <div class="col-lg-6 col-md-8 col-sm-12">

            <div class="card p-0 border-0 overflow-hidden">
                <div class="card-body p-0">
                    <div class="row m-0">
                        <div class="col-md-6 bg-secondary" style="background-image: url('https://huitzilcalli.com/public/build/assets/login-form.webp'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="col-md-6 p-5 bg-cristal">
                            <form action="<?php echo e(route('login')); ?>" novalidate method="post" autocomplete="off" class="needs-validation">
                                <?php echo csrf_field(); ?>

                                <div class="d-flex w-100 align-items-center justify-content-center img-logo">
                                    <img style=" aspect-ratio: 1/1; max-width: 40%; width: 40%;" class="img-fluid" src="https://huitzilcalli.com/resources/img/logo-lg.webp" alt="Banner">
                                </div>

                                <h1 class="text-start fw-bold mt-4 mb-1 text-light"><?php echo e(__('Iniciar Sesión')); ?></h1>
                                <div class="d-flex align-items-center justify-content-start mb-3">
                                    <div class="bg-primary" style="height: 0.35rem; width: 80%; border-radius: 5rem; overflow: hidden"></div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-3 text-light">
                                        <label for="basic-url" class="form-label"><?php echo e(__('Usuario')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="uil uil-user text-white"></i>
                                            </span>
                                            <input type="text" id="username" name="username" class="form-control border-0 <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Nombre de usuario')); ?>" required>
                                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3 text-light">
                                        <label for="basic-url" class="form-label"><?php echo e(__('Contraseña')); ?></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="uil uil-padlock text-white"></i>
                                            </span>
                                            <input type="password" id="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Contraseña')); ?>" required>
                                            <button type="button" onclick="togglePassword()" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php echo e(__('Mostrar Contraseña')); ?>">
                                                <i class="uil uil-eye" id="btnTogglePassword"></i>
                                            </button>
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center mt-3">
                                        <button type="submit" class="btn btn-primary text-white"><?php echo e(__('Ingresar')); ?></button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>

            
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        const togglePassword = () => {
            let input = document.getElementById('password');
            let btn = document.getElementById('btnTogglePassword');

            if(input.getAttribute('type') == 'password'){
                input.setAttribute('type', 'text');
            }else{
                input.setAttribute('type', 'password');
            }
            btn.classList.toggle('uil-eye');
            btn.classList.toggle('uil-eye-slash');
        }
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/huitzilcalli/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>