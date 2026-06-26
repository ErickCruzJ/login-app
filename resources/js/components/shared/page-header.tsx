interface Props{
    title: string;
    description?: string;
    children?: React.ReactNode;
}
export default function PegeHeader({
    title,
    description,
    children,
}:Props){
    return(
        <div className="flex flex-col gap-2 md:flex-row md:items-center md:jsutify-between mb-6">
            <div>
                <h1 className="text-2xl font-bold tracking-tight">
                    {title}
                </h1>
                {description &&(
                    <p className="text-sm text-muted-foreground">
                        {description}
                    </p>
                )}
            </div>
            {children && (
                <div className="flex gap-2">
                    {children}
                </div>
            )}
        </div>
    );
}