interface Props{
    title: string
    description?: string;
    action?:React.ReactNode;
}

export default function EmptyState({
    title,
    description,
    action,
}: Props){
    return(
        <div className="flex flex-col items-center py-16 text-center">
            <h3 className="text-lg font-semibold">
                {title}
            </h3>
            {description &&(
                <p className="text-sm text-muted-foreground mt-1">
                    {description}
                </p>
            )}
            {action &&(
                <div className="mt-4">
                    {action}
                </div>
            )}
        </div>
    );
}
